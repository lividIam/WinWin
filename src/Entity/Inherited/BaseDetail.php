<?php

namespace App\Entity\Inherited;

use Doctrine\ORM\Mapping as ORM;

class BaseDetail
{    
    /**
     * @var int
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    protected $name;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return BaseDetail
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
}
