<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PrayerlabsMyprofileBundle:Default:index.html.twig', array('name' => $name));
    }
}
