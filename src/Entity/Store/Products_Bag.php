<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="products_bag")
 * @ORM\Entity(repositoryClass="App\Repository\Products_BagRepository")
 */
class Products_Bag
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="\App\Entity\Store\Offer", mappedBy="productsBag", cascade={"persist"})
     */
    private $offer;
    
    /**
     * @ORM\ManyToMany(targetEntity="\App\Entity\Product\Product", mappedBy="productsBags", cascade={"persist"})
     * @ORM\JoinTable(name="bag")
     */
    private $products;
    
    
    
    public function __construct() 
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set offer to products_bag
     * 
     * @param \App\Entity\Store\Offer $offer
     * @return \App\Entity\Store\Products_Bag
     */
    public function setOffer(\App\Entity\Store\Offer $offer) 
    {        
        $offer->setProductsBag($this);
        $this->offer = $offer;
        
        return $this;
    }
    
    /**
     * Get offer
     * 
     * @return \App\Entity\Store\Offer
     */
    public function getOffer()
    {        
        return $this->offer;
    }
    
    /**
     * Add product to products_bag collection
     * 
     * @param \App\Entity\Product\Product $product
     * @return \App\Entity\Store\Products_Bag
     */
    public function setProduct(\App\Entity\Product\Product $product)
    {
        $product->setProductsBag($this);
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
}
