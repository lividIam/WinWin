<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class StoreChecker
{
    private $entityManager;
    
    private $user;



    public function __construct(EntityManagerInterface $entityManager, Security $security) 
    {
        $this->entityManager = $entityManager;
        $this->user = $security->getUser();
    }

    public function getStoreObjects()
    {
        if ($this->user != null) {
            
            $userId = $this->user->getId();
            
//            $this->entityManager->
        }

        return false;
    }
}