<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer implements UserInterface, \Serializable
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
    private $customerName;
    
    /**
     * @ORM\Column(name="surname", type="string", length=35, unique=true)
     */
    private $customerSurname;

    /**
     * @ORM\Column(name="password", type="string", length=30)
     */
    private $password;

    /**
     * @ORM\Column(name="email", type="string", length=30, unique=true)
     */
    private $email;
    
     /**
     * @ORM\Column(name="phone_number", type="string", length=15, unique=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
    }
    
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        
        return $this;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }
    
    public function setCustomerSurname($customerSurname)
    {
        $this->customerSurname = $customerSurname;
        
        return $this;
    }

    public function getCustomerSurname()
    {
        return $this->customerSurname;
    }
    
    public function getUsername()
    {
        if (!$this->customerName && !$this->customerSurname) {
            
            return false;
        }
        
        return $this->customerName.$this->customerSurname;
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
    
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        
        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }
}