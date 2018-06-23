<?php

namespace App\Entity\Product\Details;

use App\Entity\Inherited\BaseDetail;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shape
 *
 * @ORM\Table(name="version")
 * @ORM\Entity(repositoryClass="App\Repository\VersionRepository")
 */
class Version extends BaseDetail
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
     * @ORM\OneToMany(targetEntity="\App\Entity\Product\Product_Details", mappedBy="version", cascade={"persist"})
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
     * @return \App\Entity\Product\Details\Version
     */
    public function setProductDetails(\App\Entity\Product\Product_Details $productDetails)
    {
        $productDetails->setVersion($this);
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
