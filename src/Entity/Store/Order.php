<?php

namespace App\Entity\Store;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="`order`")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Person\User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $owner;   
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\Store\Auction", inversedBy="orders")
     * @ORM\JoinColumn(name="auction_id", referencedColumnName="id", nullable=false)
     */
    private $auction;
    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Store\Product_Bag", mappedBy="order", cascade={"persist"})
     */
    private $productsBags;
    
    
    
    public function __construct() 
    {
        $this->productsBags = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set owner to order
     * 
     * @param \App\Entity\Person\User $user
     * @return \App\Entity\Store\Order
     */
    public function setOwner(\App\Entity\Person\User $user = null) 
    {
        $this->owner = $user;
        
        return $this;
    }
    
    /**
     * Get owner
     * 
     * @return \App\Entity\Person\User
     */
    public function getOwner()
    {        
        return $this->owner;
    }
    
    /**
     * Set auction to order
     * 
     * @param \App\Entity\Store\Auction $auction
     * @return \App\Entity\Store\Order
     */
    public function setAuction(\App\Entity\Store\Auction $auction = null) 
    {        
        $this->auction = $auction;
        
        return $this;
    }
    
    /**
     * Get auction
     * 
     * @return \App\Entity\Store\Auction
     */
    public function getAuction()
    {
        return $this->auction;
    }
    
    /**
     * Set product_bag to order
     * 
     * @param \App\Entity\Store\Product_Bag $productBag
     * @return \App\Entity\Store\Order
     */
    public function setProductBag(\App\Entity\Store\Product_Bag $productBag = null) 
    {        
        $productBag->setOrder($this);
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
}
