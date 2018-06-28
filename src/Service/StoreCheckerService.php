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
        $id = $this->getLoggedUserId();
        
        if ($id == null) {
            
            return null;
        }

        $stores = $this->entityManager->getRepository('\App\Entity\Store\Store')->findBy(array('owner' => $id));

        return count($stores) > 0 ? $stores : null;
    }
    
    public function getLoggedUserId()
    {
        return $this->user != null ? $this->user->getId() : null;
    }
}