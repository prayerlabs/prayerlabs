<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Freequency
 */
class Freequency
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ttype;

    /**
     * @var string
     */
    private $columnDefinition;

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
     * Set type
     *
     * @param string $type
     * @return Freequency
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set columnDefinition
     *
     * @param string $columnDefinition
     * @return Freequency
     */
    public function setColumnDefinition($columnDefinition)
    {
        $this->columnDefinition = $columnDefinition;
    
        return $this;
    }

    /**
     * Get columnDefinition
     *
     * @return string 
     */
    public function getColumnDefinition()
    {
        return $this->columnDefinition;
    }

    /**
     * Set accounts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Accounts $accounts
     * @return Freequency
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
     * @return Freequency
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

    /**
     * @var string
     */
    private $type;


}