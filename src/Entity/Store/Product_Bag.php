<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="product_bag")
 * @ORM\Entity(repositoryClass="App\Repository\Product_BagRepository")
 */
class Product_Bag
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Offer", inversedBy="productsBags")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id")
     */
    private $offer;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Order", inversedBy="productsBags")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $order;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Product", inversedBy="productsBags")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;
    
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
            
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    
    /**
     * Set offer to product_bag
     * 
     * @param \App\Entity\Store\Offer $offer
     * @return \App\Entity\Store\Product_Bag
     */
    public function setOffer(\App\Entity\Store\Offer $offer) 
    {        
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
     * Set order to product_bag
     * 
     * @param \App\Entity\Store\Order $order
     * @return \App\Entity\Store\Product_Bag
     */
    public function setOrder(\App\Entity\Store\Order $order) 
    {        
        $this->order = $order;
        
        return $this;
    }
    
    /**
     * Get order
     * 
     * @return \App\Entity\Store\Order
     */
    public function getOrder()
    {        
        return $this->order;
    }
    
    /**
     * Add product to product_bag
     * 
     * @param \App\Entity\Product\Product $product
     * @return \App\Entity\Store\Product_Bag
     */
    public function setProduct(\App\Entity\Product\Product $product)
    {
        $this->product = $product;
        
        return $this;
    }
    
    /**
     * Get product
     * 
     * @return \App\Entity\Product\Product
     */
    public function getProduct()
    {        
        return $this->product;
    }
}
