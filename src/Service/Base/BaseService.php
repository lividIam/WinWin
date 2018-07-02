<?php

namespace App\Service\Base;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class BaseService
{
    protected $entityManager;
    
    protected $user;



    protected function __construct(EntityManagerInterface $entityManager, Security $security) 
    {
        $this->entityManager = $entityManager;
        $this->user = $security->getUser();
    }
    
    public function getLoggedUser()
    {
        return $this->user != null ? $this->user : null;
    }
}