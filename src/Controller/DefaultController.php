<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {
   
    /**
     * @Route("/", name="homepage")
     */
    public function homepage() 
    {
        return $this->render('default/homepage.html.twig', array());
    }
    
    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        return $this->render('customer/profile.html.twig', array());
    }
}
