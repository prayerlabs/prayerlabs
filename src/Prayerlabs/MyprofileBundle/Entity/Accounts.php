<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accounts
 */
class Accounts
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $works_at;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var \DateTime
     */
    private $last_login;

    /**
     * @var string
     */
    private $token;

    /**
     * @var \DateTime
     */
    private $verification_requested_at;

    /**
     * @var \DateTime
     */
    private $password_requested_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var integer
     */
    private $created_from_system;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $systems;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $systems_accessed;

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
        $this->systems = new \Doctrine\Common\Collections\ArrayCollection();
        $this->systems_accessed = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Accounts
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Accounts
     */
    public function setPlace($place)
    {
        $this->place = $place;
    
        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set works_at
     *
     * @param string $worksAt
     * @return Accounts
     */
    public function setWorksAt($worksAt)
    {
        $this->works_at = $worksAt;
    
        return $this;
    }

    /**
     * Get works_at
     *
     * @return string 
     */
    public function getWorksAt()
    {
        return $this->works_at;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Accounts
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
     * Set password
     *
     * @param string $password
     * @return Accounts
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Accounts
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Accounts
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set last_login
     *
     * @param \DateTime $lastLogin
     * @return Accounts
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
     * Set token
     *
     * @param string $token
     * @return Accounts
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set verification_requested_at
     *
     * @param \DateTime $verificationRequestedAt
     * @return Accounts
     */
    public function setVerificationRequestedAt($verificationRequestedAt)
    {
        $this->verification_requested_at = $verificationRequestedAt;
    
        return $this;
    }

    /**
     * Get verification_requested_at
     *
     * @return \DateTime 
     */
    public function getVerificationRequestedAt()
    {
        return $this->verification_requested_at;
    }

    /**
     * Set password_requested_at
     *
     * @param \DateTime $passwordRequestedAt
     * @return Accounts
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->password_requested_at = $passwordRequestedAt;
    
        return $this;
    }

    /**
     * Get password_requested_at
     *
     * @return \DateTime 
     */
    public function getPasswordRequestedAt()
    {
        return $this->password_requested_at;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Accounts
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
     * Set created_from_system
     *
     * @param integer $createdFromSystem
     * @return Accounts
     */
    public function setCreatedFromSystem($createdFromSystem)
    {
        $this->created_from_system = $createdFromSystem;
    
        return $this;
    }

    /**
     * Get created_from_system
     *
     * @return integer 
     */
    public function getCreatedFromSystem()
    {
        return $this->created_from_system;
    }

    /**
     * Add systems
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Systems $systems
     * @return Accounts
     */
    public function addSystem(\Prayerlabs\MyprofileBundle\Entity\Systems $systems)
    {
        $this->systems[] = $systems;
    
        return $this;
    }

    /**
     * Remove systems
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Systems $systems
     */
    public function removeSystem(\Prayerlabs\MyprofileBundle\Entity\Systems $systems)
    {
        $this->systems->removeElement($systems);
    }

    /**
     * Get systems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSystems()
    {
        return $this->systems;
    }

    /**
     * Add systems_accessed
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\SystemsAccessed $systemsAccessed
     * @return Accounts
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

    /**
     * Add comments
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Comments $comments
     * @return Accounts
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
     * @return Accounts
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
     * @ORM\PrePersist
     */
    public function setEnabledValue()
    {
        $this->enabled = 0;
    }

    /**
     * @ORM\PrePersist
     */
    public function setSaltValue()
    {
        $this->salt = 'XvMpa12!';
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
     * @ORM\PrePersist
     */
    public function setPasswordValue()
    {
        if($this->getPassword())
        {
            $this->password = md5($this->salt.$this->getPassword());
        }
        else
        {
            $this->password = md5($this->salt.'test');   
        }
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $posts;


    /**
     * Add posts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Posts $posts
     * @return Accounts
     */
    public function addPost(\Prayerlabs\MyprofileBundle\Entity\Posts $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Posts $posts
     */
    public function removePost(\Prayerlabs\MyprofileBundle\Entity\Posts $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Add freequency
     *
     * @param \Prayerlabs\MyprofileBundle\Entity\Freequency $freequency
     * @return Accounts
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
     * @var string
     */
    private $small_pic_name;

    /**
     * @var string
     */
    private $bg_pic_name;


    /**
     * Set small_pic_name
     *
     * @param string $smallPicName
     * @return Accounts
     */
    public function setSmallPicName($smallPicName)
    {
        $this->small_pic_name = $smallPicName;
    
        return $this;
    }

    /**
     * Get small_pic_name
     *
     * @return string 
     */
    public function getSmallPicName()
    {
        return $this->small_pic_name;
    }

    /**
     * Set bg_pic_name
     *
     * @param string $bgPicName
     * @return Accounts
     */
    public function setBgPicName($bgPicName)
    {
        $this->bg_pic_name = $bgPicName;
    
        return $this;
    }

    /**
     * Get bg_pic_name
     *
     * @return string 
     */
    public function getBgPicName()
    {
        return $this->bg_pic_name;
    }

    /**
     * @ORM\PrePersist
     */
    public function setVerificationToken()
    {
        $this->token = md5(time());
    }
}