<?php

namespace Prayerlabs\MyprofileBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Prayerlabs\MyprofileBundle\Entity\Accounts;
use Prayerlabs\MyprofileBundle\Entity\Posts;
use Prayerlabs\MyprofileBundle\CustomClass\Utility;
use Prayerlabs\MyprofileBundle\Form\AccountsType;
use Prayerlabs\MyprofileBundle\Form\AccountsEditType;
use Prayerlabs\MyprofileBundle\Form\AccountsChangePasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

 
class ProfileController extends Controller
{
    public function indexAction()
    {
        if(!$this->preExecute())
            return $this->redirect($this->generateUrl('prayerlabs_login'));
    	$session = $this->getRequest()->getSession();
    	$user    = $session->get('user');

    	$em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(
                        'SELECT p, a FROM PrayerlabsMyprofileBundle:Posts p JOIN p.accounts a 
                            WHERE p.accounts = :account_id ORDER BY p.expires_at DESC')
                ->setParameter('account_id', $user->getId());
        $posts = $query->getResult();
        
        return $this->render('PrayerlabsMyprofileBundle:Profile:show.html.twig', array('user' => $user, 'posts' => $posts));
    }
    
    public function signUpAction(Request $request)
    {
        $account = new Accounts();
        $form    = $this->createForm(new AccountsType(), $account);
        
        if($request->getMethod()=='POST')
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($account);
                $em->flush();
                
                $file = $form['photo']->getData();
                
                // compute a random name and try to guess the extension (more secure)
                $extension = $file->getClientOriginalExtension();
                if (!$extension) {
                    // extension cannot be guessed
                    $extension = 'bin';
                }
                $filename = rand(1, 99999).'.'.$extension;
                
                if(!file_exists('uploads/author/'.$account->getId()))
                    mkdir ('uploads/author/'.$account->getId(), 0777);
                
                $file->move('uploads/author/'.$account->getId(), $filename);
                
                $account->setSmallPicName($filename);
                $account->setEnabled(0);
               
                $em->flush();
                /*
                 *  code to send verification email
                 */
                $email   = $form['email']->getData();
                $name    = $form['name']->getData();
                $token   = $account->getToken();
                
                $this->verifyEmail($email, $name, $token);
                
                return 
                    $this->redirect($this->generateUrl('prayerlabs_login'));
            }
        }
        return 
                $this->render('PrayerlabsMyprofileBundle:Profile:signup.html.twig', 
                                array('form' => $form->createView()));
    }
    
    protected function verifyEmail($email, $name, $token)
    {
                $verification_url   = $this->container->getParameter('verification_url');
                $verification_email_subject = $this->container->getParameter('verification_email_subject');
                $from_email   = $this->container->getParameter('from_email');
                
                $url     = str_replace("{{token}}", $token, $verification_url);
                $url     = str_replace("{{email}}", $email, $url);
                $message = \Swift_Message::newInstance()
                            ->setSubject($verification_email_subject)
                            ->setFrom($from_email)
                            ->setTo($email)
                            ->setBody(
                                $this->renderView(
                                    'MyprofileBundle:Login:email.html.twig',
                                    array('name' => $name, 'url' => $url)
                                )
                            )
                        ;
                $this->get('mailer')->send($message);
    }
    
    public function sendRequestToDeleteProfileAction(Request $request)
    {
        $user = $this->getRequest()->getSession()->get('user');
        $email = $user->getEmail();
        $message = \Swift_Message::newInstance()
                            ->setSubject("Account deletion confirmation")
                            ->setFrom("info@prayerlabs.com")
                            ->setTo($email)
                            ->setBody( $this->renderView(
                                    'MyprofileBundle:Profile:account_delete.html.twig'
                                )) ;
        $this->get('mailer')->send($message);
    }
    public function removeAllDataAction(Request $request)
    {
        if(!$this->preExecute())
        {
            return 
                $this->redirect($this->generateUrl('prayerlabs_login')."?redirect_url=".$request->getRequestUri());
        }
        
        return 
            $this->render('PrayerlabsMyprofileBundle:Profile:confirmDeleteData.html.twig');
    }
    
    public function deleteAction(Request $request)
    {
        if(!$this->preExecute())
        {
            return 
                $this->redirect($this->generateUrl('prayerlabs_login'));
        }
        
        if($request->getMethod()=='POST')
        {
            $em      = $this->getDoctrine()->getManager();
            $user    = $request->getSession()->get('user');
            $id      = $user->getId();
            $account = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->findOneBy(array('id' => $id));
            $em->remove($account);
            $em->flush();
            $request->getSession()
                            ->getFlashBag()
                            ->add('notice','Your Account deleted successfully!');
             return 
                $this->redirect($this->generateUrl('thanks'));
        }
         return 
            $this->redirect($this->generateUrl('prayerlabs_login'));
    }
    
    public function logoutAction()
    {
        $session = $this->getRequest()->getSession();
        $session->clear();
        $session->invalidate();      
        
        return 
           $this->redirect($this->generateUrl('prayerlabs_login'));
    }
    
    public function editProfileAction(Request $request)
    {
        if(!$this->preExecute())
            return $this->redirect($this->generateUrl('prayerlabs_login'));
        
        $em      = $this->getDoctrine()->getManager();
        $user    = $request->getSession()->get('user');
        $id      = $user->getId();
        $account = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->findOneBy(array('id' => $id));
        
        $form    = $this->createForm(new AccountsEditType(), $account);
        
        if($request->getMethod()=='POST')
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em->persist($account);
                if($user->getEmail()!=$form['email']->getData())
                {
                    $account->setEnabled(0);
                    $request->getSession()
                            ->getFlashBag()
                            ->add('notice','Please verify new email.');
                    $token = md5(time());
                    $account->setToken($token);
                    $this->verifyEmail($account->getEmail(), $account->getName(), $token);                    
                }
                $file = $form['photo']->getData();
                $fileLarge = $form['photo_large']->getData();
                if($file->isValid())
                {
                // compute a random name and try to guess the extension (more secure)
                $extension = $file->getClientOriginalExtension();
                if (!$extension) {
                    // extension cannot be guessed
                    $extension = 'bin';
                }
                $randomNumber  = rand(1, 99999);
                $filename      = $randomNumber.'.'.$extension;
                
                if(!file_exists('uploads/author/'.$account->getId()))
                    mkdir ('uploads/author/'.$account->getId(), 0777);
                
                $file->move('uploads/author/'.$account->getId(), $filenameLarge);
                $file->move('uploads/author/'.$account->getId(), $filename);
                
                $account->setSmallPicName($filename);
                }
                
                if($fileLarge->isValid())
                {
                // compute a random name and try to guess the extension (more secure)
                $extension = $fileLarge->getClientOriginalExtension();
                if (!$extension) {
                    // extension cannot be guessed
                    $extension = 'bin';
                }
               $filenameLarge = $randomNumber.'_large.'.$extension;
                
                if(!file_exists('uploads/author/'.$account->getId()))
                    mkdir ('uploads/author/'.$account->getId(), 0777);
                
                $fileLarge->move('uploads/author/'.$account->getId(), $filenameLarge);
                
                $account->setBgPicName($filenameLarge);
                }
               
                $em->flush();
                
                return 
                    $this->redirect($this->generateUrl('prayerlabs_profile'));
            }
        }
        return 
                $this->render('PrayerlabsMyprofileBundle:Profile:edit.html.twig', 
                                array('form' => $form->createView()));
    }
    
    public function changePasswordAction(Request $request)
    {
        if(!$this->preExecute())
            return $this->redirect($this->generateUrl('prayerlabs_login'));
                
        $form    = $this->createForm(new AccountsChangePasswordType());
        
        if($request->getMethod()=='POST')
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $em      = $this->getDoctrine()->getManager();
                $user    = $request->getSession()->get('user');
                $id      = $user->getId();
                $account = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->findOneBy(array('id' => $id));
                
                $data = $form->getData();
                $password = $data['password'];
                
                $account->setPassword(md5('XvMpa12!'.$password));
                $request->getSession()
                            ->getFlashBag()
                            ->add('notice','Password updated successfully.');    
                $em->flush();
                return 
                    $this->redirect($this->generateUrl('prayerlabs_profile'));
            }
        }
        return 
                $this->render('PrayerlabsMyprofileBundle:Profile:change_password.html.twig', 
                                array('form' => $form->createView()));
    }
    
    public function profileVerifyAction(Request $request)
    {
        $email = $request->get('email');
        $token = $request->get('token');
        
        $em = $this->getDoctrine()->getManager();
        $account = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->findOneBy(array('email' => $email, 'token' => $token));
        if($account)
        {
            $account->setEnabled(1);
            $request->getSession()->getFlashBag()
                    ->add('notice', 'Your email has been verified successfully!');
        }
        else
        {
            $request->getSession()->getFlashBag()
                    ->add('notice', 'Wrong token provided!');            
        }
        return 
            $this->redirect($this->generateUrl('thanks'));
    }
    
    public function thanksAction(Request $request)
    {
         return 
            $this->render('PrayerlabsMyprofileBundle:Profile:thanks.html.twig');
    }
    protected function preExecute()
    {
        //var_dump($this->getRequest()->getSession()->has('user')); exit;
        return 
            $this->getRequest()->getSession()->has('user');
        
    }
}