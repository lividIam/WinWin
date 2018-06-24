<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="offer")
 * @ORM\Entity(repositoryClass="App\Repository\StoreRepository")
 */
class Offer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Store", inversedBy="offers")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
     */
    private $store;   
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Auction", inversedBy="offers")
     * @ORM\JoinColumn(name="auction_id", referencedColumnName="id", nullable=false)
     */
    private $auction;
    
    /**
     * @ORM\OneToOne(targetEntity="\App\Entity\Store\Products_Bag", inversedBy="offer")
     * @ORM\JoinColumn(name="products_bag_id", referencedColumnName="id")
     */
    private $productsBag;
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set store to offer
     * 
     * @param \App\Entity\Store\Store $store
     * @return \App\Entity\Store\Offer
     */
    public function setStore(\App\Entity\Store\Store $store) 
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
    
    /**
     * Set auction to offer
     * 
     * @param \App\Entity\Store\Auction $auction
     * @return \App\Entity\Product\Product
     */
    public function setAuction(\App\Entity\Store\Auction $auction = null) 
    {        
        $this->auction = $auction;
        
        return $this;
    }
    
    /**
     * Get auction
     * 
     * @return \App\Entity\Store\Auction
     */
    public function getAuction()
    {
        return $this->auction;
    }
    
    /**
     * Set products_bag to offer
     * 
     * @param \App\Entity\Store\ProductsBag $productsBag
     * @return \App\Entity\Store\Offer
     */
    public function setProductsBag(\App\Entity\Store\ProductsBag $productsBag = null) 
    {        
        $this->productsBag = $productsBag;
        
        return $this;
    }
    
    /**
     * Get products_bag
     * 
     * @return \App\Entity\Store\ProductsBag
     */
    public function getProductsBag()
    {
        return $this->productsBag;
    }
}
