<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prayed
 */
class Prayed
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Prayerlabs\MyprofileBundle\Entity\Accounts
     */
    private $accounts;

    /**
     * @var \Prayerlabs\MyprofileBundle\Entity\Posts
     */
    private $posts;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set accounts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Accounts $accounts
     * @return Prayed
     */
    public function setAccounts(\Prayerlabs\MyprofileBundle\Entity\Accounts $accounts = null)
    {
        $this->accounts = $accounts;
    
        return $this;
    }

    /**
     * Get accounts
     *
     * @return \Prayerlabs\MyprofileBundle\Entity\Accounts 
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * Set posts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Posts $posts
     * @return Prayed
     */
    public function setPosts(\Prayerlabs\MyprofileBundle\Entity\Posts $posts = null)
    {
        $this->posts = $posts;
    
        return $this;
    }

    /**
     * Get posts
     *
     * @return \Prayerlabs\MyprofileBundle\Entity\Posts 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}