<?php

namespace Prayerlabs\MyprofileBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Prayerlabs\MyprofileBundle\Entity\Accounts;
use Prayerlabs\MyprofileBundle\Entity\Posts;
use Prayerlabs\MyprofileBundle\CustomClass\Utility;
 
class ProfileController extends Controller
{
    public function indexAction()
    {
    	$session = $this->getRequest()->getSession();
    	$user = $session->get('user');

    	$em = $this->getDoctrine()->getManager();

		$query = $em->createQuery(
				'SELECT p, a FROM PrayerlabsMyprofileBundle:Posts p JOIN p.accounts a WHERE p.accounts = :account_id ORDER BY p.expires_at DESC')->setParameter('account_id', $user->getId());
		$posts = $query->getResult();
                //$latestPost = $posts[0];
                //$timePostedString = Utility::calculateDateDifference(date('U'), $latestPost->getCreatedAt()->format('U'));
        return $this->render('PrayerlabsMyprofileBundle:Profile:show.html.twig', array('user' => $user, 'posts' => $posts));
    }
}