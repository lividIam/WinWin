<?php

namespace App\Entity\Product;

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
      
//    private $size;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Details\Manufacturer", inversedBy="productsDetails")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id")
     */
    private $manufacturer;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Details\Model", inversedBy="productsDetails")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    private $model;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Details\Version", inversedBy="productsDetails")
     * @ORM\JoinColumn(name="version_id", referencedColumnName="id")
     */
    private $version;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Details\Color", inversedBy="productsDetails")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    private $color;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Details\Shape", inversedBy="productsDetails")
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
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Product", inversedBy="productDetails")
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
     * Set manufacturer to product_details
     * 
     * @param \App\Entity\Product\Details\Manufacturer $manufacturer
     * @return \App\Entity\Product\Product_Details
     */
    public function setManufacturer(\App\Entity\Product\Details\Manufacturer $manufacturer = null) 
    {        
        $this->manufacturer = $manufacturer;
        
        return $this;
    }
    
    /**
     * Get manufacturer
     * 
     * @return \App\Entity\Product\Details\Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }
    
    /**
     * Set model to product_details
     * 
     * @param \App\Entity\Product\Details\Model $model
     * @return \App\Entity\Product\Product_Details
     */
    public function setModel(\App\Entity\Product\Details\Model $model = null) 
    {        
        $this->model = $model;
        
        return $this;
    }
    
    /**
     * Get model
     * 
     * @return \App\Entity\Product\Details\Model
     */
    public function getModel()
    {
        return $this->model;
    }
    
    /**
     * Set version to product_details
     * 
     * @param \App\Entity\Product\Details\Version $version
     * @return \App\Entity\Product\Product_Details
     */
    public function setVersion(\App\Entity\Product\Details\Version $version = null) 
    {        
        $this->version = $version;
        
        return $this;
    }
    
    /**
     * Get version
     * 
     * @return \App\Entity\Product\Details\Version
     */
    public function getVersion()
    {
        return $this->version;
    }
    
    /**
     * Set color to product_details
     * 
     * @param \App\Entity\Product\Details\Color $color
     * @return \App\Entity\Product\Product_Details
     */
    public function setColor(\App\Entity\Product\Details\Version $color = null) 
    {        
        $this->color = $color;
        
        return $this;
    }
    
    /**
     * Get color
     * 
     * @return \App\Entity\Product\Details\Color
     */
    public function getColor()
    {
        return $this->color;
    }
    
    /**
     * Set shape to product_details
     * 
     * @param \App\Entity\Product\Details\Shape $shape
     * @return \App\Entity\Product\Product_Details
     */
    public function setShape(\App\Entity\Product\Details\Shape $shape = null) 
    {        
        $this->shape = $shape;
        
        return $this;
    }
    
    /**
     * Get shape
     * 
     * @return \App\Entity\Product\Details\Shape
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
     * @param \App\Entity\Product\Product $product
     * @return \App\Entity\Product\Product_Details
     */
    public function setProduct(\App\Entity\Product\Product $product = null) 
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
