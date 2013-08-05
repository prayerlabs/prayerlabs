<?php

namespace Prayerlabs\MyprofileBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Prayerlabs\MyprofileBundle\Entity\Accounts;
 
class LoadAccountsData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $user = new Accounts();
    $user->setName('Huzefa');
    $user->setPlace('Dadar');
    $user->setWorksAt('Mumbai');
    $user->setEmail('demo@gmail.com');
    $user->setPassword('demo');
    $user->setEnabled(1);
    $user->setCreatedFromSystem(1);

    $em->persist($user);
 
    $em->flush();
  }
 
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
}