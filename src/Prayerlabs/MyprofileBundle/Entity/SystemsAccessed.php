<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SystemsAccessed
 */
class SystemsAccessed
{
    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var \DateTime
     */
    private $last_login;

    /**
     * @var \Prayerlabs\MyprofileBundle\Entity\Systems
     */
    private $systems;

    /**
     * @var \Prayerlabs\MyprofileBundle\Entity\Accounts
     */
    private $accounts;


    /**
     * Set last_login
     *
     * @param \DateTime $lastLogin
     * @return SystemsAccessed
     */
    public function setLastLogin($lastLogin)
    {
        $this->last_login = $lastLogin;
    
        return $this;
    }

    /**
     * Get last_login
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Set systems
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Systems $systems
     * @return SystemsAccessed
     */
    public function setSystems(\Prayerlabs\MyprofileBundle\Entity\Systems $systems = null)
    {
        $this->systems = $systems;
    
        return $this;
    }

    /**
     * Get systems
     *
     * @return \Prayerlabs\MyprofileBundle\Entity\Systems 
     */
    public function getSystems()
    {
        return $this->systems;
    }

    /**
     * Set accounts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Accounts $accounts
     * @return SystemsAccessed
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}