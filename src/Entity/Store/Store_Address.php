<?php

namespace App\Entity\Store;

use App\Entity\Inherited\BaseAddress;
use Doctrine\ORM\Mapping as ORM;

/**
 * Store_Address
 *
 * @ORM\Table(name="store_address")
 * @ORM\Entity(repositoryClass="App\Repository\Store_AddressRepository")
 */
class Store_Address extends BaseAddress
{    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="\App\Entity\Store\Store", inversedBy="address")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id")
     */
    private $store;
    
    
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set store to address
     * 
     * @param \App\Entity\Store\Store $store
     * @return \App\Entity\Store\Store_Address
     */
    public function setStore(\App\Entity\Store\Store $store = null) 
    {        
        $this->store = $store;
        
        return $this;
    }
    
    /**
     * Get store
     * 
     * @return \App\Entity\Store\Store
     */
    public function getStore()
    {
        return $this->store;
    }
}
