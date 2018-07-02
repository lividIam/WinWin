<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class UserService
{
    private $entityManager;
    
    private $user;



    public function __construct(EntityManagerInterface $entityManager, Security $security) 
    {
        $this->entityManager = $entityManager;
        $this->user = $security->getUser();
    }
    
    public function getLoggedUser()
    {
        return $this->user != null ? $this->user : null;
    }
}