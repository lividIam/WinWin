<?php

namespace App\Service;

use App\Service\Base\BaseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class UserService extends BaseService
{
    public function __construct(EntityManagerInterface $entityManager, Security $security) 
    {
        parent::__construct($entityManager, $security);
    }
}