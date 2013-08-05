<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Systems
 */
class Systems
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $systems_accessed;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->systems_accessed = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set label
     *
     * @param string $label
     * @return Systems
     */
    public function setLabel($label)
    {
        $this->label = $label;
    
        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Systems
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add systems_accessed
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\SystemsAccessed $systemsAccessed
     * @return Systems
     */
    public function addSystemsAccessed(\Prayerlabs\MyprofileBundle\Entity\SystemsAccessed $systemsAccessed)
    {
        $this->systems_accessed[] = $systemsAccessed;
    
        return $this;
    }

    /**
     * Remove systems_accessed
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\SystemsAccessed $systemsAccessed
     */
    public function removeSystemsAccessed(\Prayerlabs\MyprofileBundle\Entity\SystemsAccessed $systemsAccessed)
    {
        $this->systems_accessed->removeElement($systemsAccessed);
    }

    /**
     * Get systems_accessed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSystemsAccessed()
    {
        return $this->systems_accessed;
    }
}