<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="offer")
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository")
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
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Product_Bag", mappedBy="offer", cascade={"persist"})
     */
    private $productsBags;
    
    
    
    public function __construct() 
    {
        $this->productsBags = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
    
    /**
     * Set auction to offer
     * 
     * @param \App\Entity\Store\Auction $auction
     * @return \App\Entity\Store\Offer
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
     * Set product_bag to offer
     * 
     * @param \App\Entity\Store\Product_Bag $productBag
     * @return \App\Entity\Store\Offer
     */
    public function setProductBag(\App\Entity\Store\Product_Bag $productBag = null) 
    {        
        $productBag->setOffer($this);
        $this->productsBags[] = $productBag;
        
        return $this;
    }
    
    /**
     * Get products_bags
     * 
     * @return \App\Entity\Store\Product_Bag
     */
    public function getProductsBags()
    {
        return $this->productsBags;
    }
}
