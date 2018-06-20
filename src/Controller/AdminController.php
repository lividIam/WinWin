<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}
