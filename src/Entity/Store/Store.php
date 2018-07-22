<?php

namespace App\Entity\Store;

use App\Entity\Inherited\BaseAddress;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="store")
 * @ORM\Entity(repositoryClass="App\Repository\StoreRepository")
 */
class Store extends BaseAddress
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
     * @ORM\Column(type="string", length=35, unique=true)
     */
    private $slug;
    
    /**
     * @ORM\Column(name="logo", type="string", length=100)
     */
    private $logo;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Person\User", inversedBy="stores")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $owner;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Product\Product", mappedBy="store", cascade={"persist"})
     */
    private $products;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Auction", mappedBy="store", cascade={"persist"})
     */
    private $auctions;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Offer", mappedBy="store", cascade={"persist"})
     */
    private $offers;
    
    /**
     * Add office and finance credentials
     */
    
    
    
    public function __construct() 
    {
        $this->auctions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
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
     * @param \App\Entity\Person\User $user
     * @return \App\Entity\Store\Store
     */
    public function setOwner(\App\Entity\Person\User $user = null) 
    {        
        $this->owner = $user;
        
        return $this;
    }
    
    /**
     * Get owner
     * 
     * @return \App\Entity\Person\User
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    /**
     * Add product to products collection
     * 
     * @param \App\Entity\Product\Product $product
     * @return \App\Entity\Store\Store
     */
    public function setProduct(\App\Entity\Product\Product $product)
    {
        $product->setStore($this);
        $this->products[] = $product;
        
        return $this;
    }
    
    /**
     * Get products
     * 
     * @return \App\Entity\Product\Product
     */
    public function getProducts()
    {        
        return $this->products;
    }
    
    /**
     * Add auction to auctions collection
     * 
     * @param \App\Entity\Store\Auction $auction
     * @return \App\Entity\Store\Store
     */
    public function setAuction(\App\Entity\Store\Auction $auction)
    {
        $auction->setStore($this);
        $this->auctions[] = $auction;
        
        return $this;
    }
    
    /**
     * Get auctions
     * 
     * @return \App\Entity\Store\Auction
     */
    public function getAuctions()
    {        
        return $this->auctions;
    }
    
    /**
     * Set offer to offers
     * 
     * @param \App\Entity\Store\Offer $offer
     * @return \App\Entity\Store\Store
     */
    public function setOffer(\App\Entity\Store\Offer $offer = null) 
    {     
        $offer->setStore($this);
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
    
    public function __toString() 
    {
        return $this->getName();
    }
}
