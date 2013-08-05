<?php

namespace Prayerlabs\MyprofileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 */
class Comments
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
     * @return Comments
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
     * @return Comments
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
     * Set description
     *
     * @param string $description
     * @return Comments
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
     * @return Comments
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
     * @return Comments
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
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }
}