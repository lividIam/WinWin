<?php

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Product\Product_Details", mappedBy="product", cascade={"persist"})
     */
    private $productDetails;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Product\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Store", inversedBy="products")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false)
     */
    private $store;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Product_Bag", mappedBy="product", cascade={"persist"})
     */
    private $productsBags;
    
    
    
    public function __construct() 
    {
        $this->productDetails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productsBags = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Add product_detail to product_details collection
     * 
     * @param \App\Entity\Product\Product_Details $productDetail
     * @return \App\Entity\Product\Product
     */
    public function setProductDetail(\App\Entity\Product\Product_Details $productDetail)
    {
        $productDetail->setProduct($this);
        $this->productDetails[] = $productDetail;
        
        return $this;
    }
    
    /**
     * Get product_details
     * 
     * @return \App\Entity\Product\Product_Details
     */
    public function getProductDetails()
    {        
        return $this->productDetails;
    }
    
    /**
     * Set category to product
     * 
     * @param \App\Entity\Product\Category $category
     * @return \App\Entity\Product\Product
     */
    public function setCategory(\App\Entity\Product\Category $category = null) 
    {        
        $this->category = $category;
        
        return $this;
    }
    
    /**
     * Get category
     * 
     * @return \App\Entity\Product\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Set store to product
     * 
     * @param \App\Entity\Store\Store $store
     * @return \App\Entity\Product\Product
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
     * Add product_bag to products_bags collection
     * 
     * @param \App\Entity\Store\Product_Bag $productBag
     * @return \App\Entity\Product\Product
     */
    public function setProductsBag(\App\Entity\Store\Product_Bag $productBag)
    {
        $productBag->setProduct($this);
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
    
    public function __toString()
    {        
        return $this->getName();
    }
}

