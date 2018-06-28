<?php

namespace App\Controller;

use App\Service\StoreCheckerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class StoreController extends AbstractController {
   
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/store", name="store")
     */
    public function storeAction(StoreCheckerService $storeChecker) 
    {
        $stores = $storeChecker->getStoreObjects();
        
        return $this->render('store/store.html.twig', array(
            'stores' => $stores
        ));
    }
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/store/create", name="store_create")
     */
    public function createStoreAction(StoreCheckerService $storeChecker) 
    {        
        return $this->render('store/store_create.html.twig', array());
    }
}

