<?php

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Product\Product", mappedBy="category", cascade={"persist"})
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

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Add product to products collection
     * 
     * @param \App\Entity\Product\Product $product
     * @return \App\Entity\Product\Category
     */
    public function setProduct(\App\Entity\Product\Product $product)
    {
        $product->setCategory($this);
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
    
    public function __toString(){

        return $this->getName();
    }
}

