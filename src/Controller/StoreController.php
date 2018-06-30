<?php

namespace App\Controller;

use App\Entity\Store\Store;
use App\Form\StoreType;
use App\Service\StoreCheckerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
     * @Method({"GET", "POST"})
     */
    public function createStoreAction(Request $request, StoreCheckerService $storeChecker) 
    {        
        $store = new Store();
        
        $form = $this->createForm(StoreType::class, $store);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $store->setOwner($storeChecker->getLoggedUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($store);
            $entityManager->flush();
            
//            return $this->render('user/profile.html.twig', array());
            
            return $this->render('store/store_create.html.twig', array(
                'form' => $form->createView()
            ));
        }
        
        return $this->render('store/store_create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/store/dashboard/{name}", name="store_dashboard")
     */
    public function dashboardStoreAction(StoreCheckerService $storeChecker) 
    {
        $stores = $storeChecker->getStoreObjects();
        
        return $this->render('store/store.html.twig', array(
            'stores' => $stores
        ));
    }
}
