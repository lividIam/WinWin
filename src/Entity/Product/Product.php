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
     * @ORM\Column(name="description", type="string", length=255)
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
    
    
    
    public function __construct() 
    {
        $this->productDetails = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add product_detail to product collection
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
    
    public function __toString()
    {        
        return $this->getName();
    }
}

