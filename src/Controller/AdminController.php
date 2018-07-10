<?php

namespace App\Controller;

use App\Entity\Product\Category;
use App\Form\CategoryType;
use App\Utils\Slugger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Admin controller.
 *
 * @Route("/admin")
 */
class AdminController extends AbstractController 
{    
    /**
     * @Route("/users", name="users")
     */
    public function profile()
    {
        return $this->render('admin/users.html.twig', array());
    }
    
    /**
     * @Security("has_role('ROLE_ADMIN')")
     * @Route("/category/create", name="category_create")
     * @Method({"GET", "POST"})
     */
    public function createCategory(Request $request, Slugger $slugger)
    {
        $category = new Category();
        
        $form = $this->createForm(CategoryType::class, $category);
        
        if ($request->isMethod('POST')) {
            
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $slug = $slugger->slugify($category->getName());

                $category->setSlug($slug);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($category);
                $entityManager->flush();
                
                

//                return $this->redirectToRoute('store_dashboard', array(
//                    'slug' => $slug
//                ));
            }
        }
        
        return $this->render('admin/category_create.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
