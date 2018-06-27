<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class StoreCheckerService
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
            
            $stores = $this->entityManager->getRepository('\App\Entity\Store\Store')->findBy(array('owner' => $userId));

            if (count($stores)) {
                
                return $stores;
            }
            
            return null;
        }

        return false;
    }
}