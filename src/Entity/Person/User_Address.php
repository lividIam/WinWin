<?php

namespace App\Entity\Person;

use App\Entity\Inherited\BaseAddress;
use Doctrine\ORM\Mapping as ORM;

/**
 * User_Address
 *
 * @ORM\Table(name="user_address")
 * @ORM\Entity(repositoryClass="App\Repository\User_AddressRepository")
 */
class User_Address extends BaseAddress
{    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Person\User", inversedBy="addresses")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;
    
    
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set user to address
     * 
     * @param \App\Entity\Person\User $user
     * @return \App\Entity\Person\User_Address
     */
    public function setUser(\App\Entity\Person\User $user = null) 
    {        
        $this->user = $user;
        
        return $this;
    }
    
    /**
     * Get user
     * 
     * @return \App\Entity\Person\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
