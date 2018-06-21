<?php

namespace App\Entity\Common;

use Doctrine\ORM\Mapping as ORM;

class BaseAddress
{    
    /**
     * @var int
     *
     * @ORM\Column(name="phoneNumber", type="string", length=15)
     */
    protected $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=50)
     */
    protected $street;

    /**
     * @var string
     *
     * @ORM\Column(name="streetNumber", type="string", length=20)
     */
    protected $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="buildingNumber", type="string", length=10)
     */
    protected $buildingNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postCode", type="string", length=10)
     */
    protected $postCode;


    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Address
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set streetNumber
     *
     * @param string $streetNumber
     *
     * @return Address
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set buildingNumber
     *
     * @param string $buildingNumber
     *
     * @return Address
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;

        return $this;
    }

    /**
     * Get buildingNumber
     *
     * @return string
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     *
     * @return Address
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }
}