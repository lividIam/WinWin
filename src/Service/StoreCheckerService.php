<?php

namespace App\Service;

use App\Service\Base\BaseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class StoreCheckerService extends BaseService
{
    public function __construct(EntityManagerInterface $entityManager, Security $security) 
    {
        parent::__construct($entityManager, $security);
    }

    public function getStoreObjects()
    {  
        $user = $this->getLoggedUser();
        
        if ($user == null) {
            
            return null;
        }

        $stores = $this->entityManager->getRepository('\App\Entity\Store\Store')->findBy(array(
            'owner' => $user
        ));

        return count($stores) > 0 ? $stores : null;
    }
}