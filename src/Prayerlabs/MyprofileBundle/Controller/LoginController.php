<?php

namespace Prayerlabs\MyprofileBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Prayerlabs\MyprofileBundle\Entity\Accounts;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
 
class LoginController extends Controller
{
    public function indexAction()
    {
        return $this->render('PrayerlabsMyprofileBundle:Login:show.html.twig');
    }

    public function validatorAction(Request $request)
    {
    	$email = $request->request->get('login');
    	$password = $request->request->get('password');
    	if($email && $password)
		{
			$em = $this->getDoctrine()->getManager();

			$query = $em->createQuery(
				'SELECT a FROM PrayerlabsMyprofileBundle:Accounts a WHERE a.email = :email and a.password = :password and a.enabled =:enabled'
				)
                                ->setParameter('email',    $email)
                                ->setParameter('password', md5('XvMpa12!'.$password))
                                ->setParameter('enabled',  1);
			try
                        {
                            $user = $query->getSingleResult();
                        }
                        catch (\Doctrine\ORM\NoResultException $e)
                        {
                            $this->get('session')->getFlashBag()->add('notice',"Invalid email id or password Or, you haven't verified your email");
                            return $this->redirect($this->generateUrl("prayerlabs_login"));
                        }
			if(!empty($user))
			{
				$session = $this->getRequest()->getSession();
				$session->set('user',$user);
                                                               
				return $this->redirect($this->generateUrl("prayerlabs_profile"));
			}
			else
			{
				$this->get('session')->getFlashBag()->add('notice','Invalid email id or password');
				return $this->redirect($this->generateUrl("prayerlabs_login"));
			}
		}
		else
		{
			$this->get('session')->getFlashBag()->add('notice','Please provide valid email id or password');
			return $this->redirect($this->generateUrl("prayerlabs_login"));
		}

		return new Response();
    }
}