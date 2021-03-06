<?php

namespace App\Entity\Person;

use App\Entity\Inherited\BaseAddress;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseAddress implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=35, unique=true)
     */
    private $name;
    
    /**
     * @ORM\Column(name="surname", type="string", length=35, unique=true)
     */
    private $surname;

    /**
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(name="email", type="string", length=30, unique=true)
     */
    private $email;
    
    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Store", mappedBy="owner", cascade={"persist"})
     */
    private $stores;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Order", mappedBy="owner", cascade={"persist"})
     */
    private $orders;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
        $this->isActive = true;
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->stores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
    
    public function setSurname($surname)
    {
        $this->surname = $surname;
        
        return $this;
    }

    public function getSurname()
    {
        return $this->surname;
    }
    
    public function setPassword($pass)
    {
        $this->password = $pass;
        
        return $this;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }
    
    public function getUsername()
    {
        return $this->getEmail();
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->password
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }
    
    /**
     * Add store to user collection
     * 
     * @param \App\Entity\Store\Store $store
     * @return \App\Entity\Person\User
     */
    public function setStore(\App\Entity\Store\Store $store)
    {
        $store->setOwner($this);
        $this->stores[] = $store;
        
        return $this;
    }
    
    /**
     * Get stores
     * 
     * @return \App\Entity\Store\Store
     */
    public function getStores()
    {        
        return $this->stores;
    }
    
    /**
     * Set order to orders
     * 
     * @param \App\Entity\Store\Order $order
     * @return \App\Entity\Person\User
     */
    public function setOrder(\App\Entity\Store\Order $order = null) 
    {     
        $order->setOwner($this);
        $this->orders[] = $order;
        
        return $this;
    }
    
    /**
     * Get offers
     * 
     * @return \App\Entity\Store\Order
     */
    public function getOrders()
    {
        return $this->orders;
    }
    
    public function __toString() 
    {
        return $this->getName();
    }
}