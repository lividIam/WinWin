<?php

namespace App\Entity;

use App\Entity\Inherited\BaseDetail;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shape
 *
 * @ORM\Table(name="shape")
 * @ORM\Entity(repositoryClass="App\Repository\ShapeRepository")
 */
class Shape extends BaseDetail
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
     * @ORM\OneToMany(targetEntity="Product_Details", mappedBy="shape", cascade={"persist"})
     */
    private $productsDetails;
    
    
    
    public function __construct() 
    {
        $this->productsDetails = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add product_details to products_details collection
     * 
     * @param \App\Entity\Product_Details $productDetails
     * @return \App\Entity\Shape
     */
    public function setProductDetails(\App\Entity\Product_Details $productDetails)
    {
        $productDetails->setShape($this);
        $this->productsDetails[] = $productDetails;
        
        return $this;
    }
    
    /**
     * Get products_details
     * 
     * @return \App\Entity\Product_Details
     */
    public function getProductsDetails()
    {        
        return $this->productsDetails;
    }
    
    public function __toString(){

        return $this->getName();
    }
}
