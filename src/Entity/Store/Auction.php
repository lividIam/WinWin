<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="auction")
 * @ORM\Entity(repositoryClass="App\Repository\AuctionRepository")
 */
class Auction
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
     * @ORM\Column(name="description_date", type="datetime")
     */
    private $expirationDate;
    
    /**
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Store", inversedBy="auctions")
     * @ORM\JoinColumn(name="auction_id", referencedColumnName="id", nullable=false)
     */
    private $store;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Offer", mappedBy="auction", cascade={"persist"})
     */
    private $offers;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Order", mappedBy="auction", cascade={"persist"})
     */
    private $orders;
    
    
    
    public function __construct() 
    {
        $this->offers = new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = new \DateTime($expirationDate);

        return $this;
    }
    
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
    
    /**
     * Set store to auction
     * 
     * @param \App\Entity\Store\Store $store
     * @return \App\Entity\Store\Auction
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
     * Add offer to offers collection
     * 
     * @param \App\Entity\Store\Offer $offer
     * @return \App\Entity\Store\Auction
     */
    public function setOffer(\App\Entity\Store\Offer $offer)
    {
        $offer->setOffer($this);
        $this->offers[] = $offer;
        
        return $this;
    }
    
    /**
     * Get offers
     * 
     * @return \App\Entity\Store\Offer
     */
    public function getOffers()
    {        
        return $this->offers;
    }
    
    /**
     * Add oder to orders collection
     * 
     * @param \App\Entity\Store\Order $order
     * @return \App\Entity\Store\Auction
     */
    public function setOrder(\App\Entity\Store\Order $order)
    {
        $order->setOrder($this);
        $this->orders[] = $order;
        
        return $this;
    }
    
    /**
     * Get orders
     * 
     * @return \App\Entity\Store\Order
     */
    public function getOrders()
    {        
        return $this->orders;
    }
}
