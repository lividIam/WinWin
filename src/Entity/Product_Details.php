<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product_Details
 *
 * @ORM\Table(name="product_details")
 * @ORM\Entity(repositoryClass="App\Repository\Product_DetailsRepository")
 */
class Product_Details 
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
//    private $version;
//    
//    private $size;
//    
//    private $model;
//    
//    private $color;
    
    /**
     * @ORM\ManyToOne(targetEntity="Shape", inversedBy="productsDetails")
     * @ORM\JoinColumn(name="shape_id", referencedColumnName="id")
     */
    private $shape;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
    
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
   
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productDetails")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;
    
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set shape to product_details
     * 
     * @param \App\Entity\Shape $shape
     * @return \App\Entity\Product_Details
     */
    public function setShape(\App\Entity\Shape $shape = null) 
    {        
        $this->shape = $shape;
        
        return $this;
    }
    
    /**
     * Get shape
     * 
     * @return \App\Entity\Shape
     */
    public function getShape()
    {
        return $this->shape;
    }
    
    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Product_Details
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    
        /**
     * Set price
     *
     * @param float $price
     *
     * @return Product_Details
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Set product to product_details
     * 
     * @param \App\Entity\Product $product
     * @return \App\Entity\Product_Details
     */
    public function setProduct(\App\Entity\Product $product = null) 
    {        
        $this->product = $product;
        
        return $this;
    }
    
    /**
     * Get product
     * 
     * @return \App\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
