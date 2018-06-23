<?php

namespace App\Entity\Product\Details;

use App\Entity\Inherited\BaseDetail;
use Doctrine\ORM\Mapping as ORM;

/**
 * Manufacturer
 *
 * @ORM\Table(name="manufacturer")
 * @ORM\Entity(repositoryClass="App\Repository\ManufacturerRepository")
 */
class Manufacturer extends BaseDetail
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
     * @ORM\OneToMany(targetEntity="\App\Entity\Product\Product_Details", mappedBy="manufacturer", cascade={"persist"})
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
     * @param \App\Entity\Product\Product_Details $productDetails
     * @return \App\Entity\Product\Details\Manufacturer
     */
    public function setProductDetails(\App\Entity\Product\Product_Details $productDetails)
    {
        $productDetails->setManufacturer($this);
        $this->productsDetails[] = $productDetails;
        
        return $this;
    }
    
    /**
     * Get products_details
     * 
     * @return \App\Entity\Product\Product_Details
     */
    public function getProductsDetails()
    {        
        return $this->productsDetails;
    }
}
