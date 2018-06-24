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
}
