<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="store")
 * @ORM\Entity(repositoryClass="App\Repository\StoreRepository")
 */
class Store
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=35, unique=true)
     */
    private $name;
    
    /**
     * @ORM\Column(name="logo", type="string", length=100)
     */
    private $logo;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\User", inversedBy="stores")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $owner;
    
    /**
     * @ORM\OneToOne(targetEntity="Store_Address", mappedBy="store", cascade={"persist"})
     */
    private $address;
    
    /**
     * Add office and finance credentials
     */
    
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }
    
    public function getLogo()
    {
        return $this->logo;
    }
    
    /**
     * Set owner to store
     * 
     * @param \App\Entity\User $user
     * @return \App\Entity\Store\Store
     */
    public function setOwner(\App\Entity\User $user = null) 
    {        
        $this->owner = $user;
        
        return $this;
    }
    
    /**
     * Get owner
     * 
     * @return \App\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    /**
     * Set address to store
     * 
     * @param \App\Entity\Store\Store_Address $address
     * @return \App\Entity\Store\Store
     */
    public function setAddress(\App\Entity\Store\Store_Address $address) 
    {        
        $address->setStore($this);
        $this->address = $address;
        
        return $this;
    }
    
    /**
     * Get address
     * 
     * @return \App\Entity\Store\Store_Address
     */
    public function getAddress()
    {        
        return $this->address;
    }
}
