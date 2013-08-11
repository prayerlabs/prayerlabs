<?php

namespace Prayerlabs\MyprofileBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Prayerlabs\MyprofileBundle\Entity\Accounts;
use Prayerlabs\MyprofileBundle\Entity\Posts;
use Prayerlabs\MyprofileBundle\CustomClass\Utility;
use Prayerlabs\MyprofileBundle\Form\AccountsType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

 
class ProfileController extends Controller
{
    public function indexAction()
    {
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
                $em->flush();
                
                return 
                    $this->redirect($this->generateUrl('prayerlabs_login'));
            }
        }
        return 
                $this->render('PrayerlabsMyprofileBundle:Profile:signup.html.twig', 
                                array('form' => $form->createView()));
    }
}