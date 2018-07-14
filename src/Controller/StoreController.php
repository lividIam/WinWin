<?php

namespace App\Controller;

use App\Entity\Store\Store;
use App\Entity\Product\Product;
use App\Form\StoreType;
use App\Form\ProductType;
use App\Service\StoreCheckerService;
use App\Utils\Slugger;
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
    public function store(StoreCheckerService $storeChecker) 
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
    public function createStore(Request $request, Slugger $slugger, StoreCheckerService $storeChecker) 
    {        
        $store = new Store();
        
        $form = $this->createForm(StoreType::class, $store);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $slug = $slugger->slugify($store->getName());
            
            $store->setSlug($slug);
            $store->setOwner($storeChecker->getLoggedUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($store);
            $entityManager->flush();
            
            return $this->redirectToRoute('store_dashboard', array(
                'slug' => $slug
            ));
        }
        
        return $this->render('store/store_create.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/store/dashboard/{slug}", name="store_dashboard")
     * @Method({"GET", "POST"})
     */
    public function dashboardStore(StoreCheckerService $storeChecker, $slug) 
    {
        $user = $storeChecker->getLoggedUser();
        
        if ($user) {
            
            $store = $this->getDoctrine()->getRepository('\App\Entity\Store\Store')->findOneBy(array(
                'slug' => $slug
            ));

            if ($store->getOwner() == $user) {

                return $this->render('store/store_dashboard.html.twig', array(
                    'store' => $store
                ));
                
            }
                
            return $this->redirectToRoute('store_homepage', array(
                'slug'  => $slug,
                'store' => $store
            ));
        }
    }
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/store/{slug}", name="store_homepage")
     * @Method({"GET", "POST"})
     */
    public function homepageStore() 
    {
        return $this->render('store/store_homepage.html.twig', array(
//            'store' => $store
        ));
    }
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/store/dashboard/{slug}/product/add", name="store_dashboard_product_add")
     * @Method({"GET", "POST"})
     */
    public function dashboardStoreProductAdd(Request $request, StoreCheckerService $storeChecker, $slug) 
    {
        $user = $storeChecker->getLoggedUser();
        
        if ($user) {
            
            $store = $this->getDoctrine()->getRepository('\App\Entity\Store\Store')->findOneBy(array(
                'slug' => $slug
            ));

            if ($store->getOwner() == $user) {
                
                $product = new Product();
        
                $form = $this->createForm(ProductType::class, $product);

                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {

                    var_dump('suka blyat');die;
                    
//                    $entityManager = $this->getDoctrine()->getManager();
//                    $entityManager->persist($product);
//                    $entityManager->flush();
                    
//                    * waiting to be added
//                    return $this->redirectToRoute('store_dashboard_product', array(
//                        'slug' => $productSlug
//                    ));
                }
        
                return $this->render('store/store_dashboard_product_add.html.twig', array(
                    'slug'  => $slug,
                    'form'  => $form->createView()
                ));
            }
                
            return $this->redirectToRoute('store');
        }
    }
}
