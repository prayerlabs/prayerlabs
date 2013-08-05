<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Prayerlabs\MyprofileBundle\Entity\Accounts;
use Symfony\Component\HttpFoundation\Request;

/**
 * Posts
 */
class Posts
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \DateTime
     */
    private $expires_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prayed;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $freequency;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prayed = new \Doctrine\Common\Collections\ArrayCollection();
        $this->freequency = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return Posts
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Posts
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Posts
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return Posts
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;
    
        return $this;
    }

    /**
     * Get expires_at
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Add comments
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Comments $comments
     * @return Posts
     */
    public function addComment(\Prayerlabs\MyprofileBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Comments $comments
     */
    public function removeComment(\Prayerlabs\MyprofileBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add prayed
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Prayed $prayed
     * @return Posts
     */
    public function addPrayed(\Prayerlabs\MyprofileBundle\Entity\Prayed $prayed)
    {
        $this->prayed[] = $prayed;
    
        return $this;
    }

    /**
     * Remove prayed
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Prayed $prayed
     */
    public function removePrayed(\Prayerlabs\MyprofileBundle\Entity\Prayed $prayed)
    {
        $this->prayed->removeElement($prayed);
    }

    /**
     * Get prayed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrayed()
    {
        return $this->prayed;
    }

    /**
     * Add freequency
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Freequency $freequency
     * @return Posts
     */
    public function addFreequency(\Prayerlabs\MyprofileBundle\Entity\Freequency $freequency)
    {
        $this->freequency[] = $freequency;
    
        return $this;
    }

    /**
     * Remove freequency
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Freequency $freequency
     */
    public function removeFreequency(\Prayerlabs\MyprofileBundle\Entity\Freequency $freequency)
    {
        $this->freequency->removeElement($freequency);
    }

    /**
     * Get freequency
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFreequency()
    {
        return $this->freequency;
    }
    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        if(!$this->getExpiresAt())
        {
            $now = $this->getCreatedAt() ? $this->getCreatedAt()->format('U') : time();
            $this->expires_at = new \DateTime(date('Y-m-d H:i:s', $now + 86400 * 30));
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setUpdatedAtValue()
    {
        if(!$this->getUpdatedAt())
        {
            $this->updated_at = new \DateTime();
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if(!$this->getCreatedAt())
        {
            $this->created_at = new \DateTime();
        }
    }
    /**
     * @var \Prayerlabs\MyprofileBundle\Entity\Accounts
     */
    private $accounts;


    /**
     * Set accounts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Accounts $accounts
     * @return Posts
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
     * @ORM\PrePersist
     */
    public function setAccountsValue()
    {
        if(!$this->getAccounts())
        {
            $session = $this->getRequest()->getSession();
            $user = $session->get('user');
            $this->accounts = $user;
        }
    }

    public function getHourMinValue()
    {
        $updated_date = $this->getUpdatedAt();
        $hour = date("h", time()-$updated_date->format('U'));
        $minute = date("i", time()-$updated_date->format('U'));

        return "$hour hours and $minute minutes ago";
    }
}