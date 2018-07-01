<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class UserController extends AbstractController {
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/profile", name="user_profile")
     */
    public function profileAction()
    {
        return $this->render('user/user_profile.html.twig');
    }
    
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/profile/address", name="user_address")
     */
    public function profileAddressAction()
    {
        return $this->render('user/user_address.html.twig');
    }
}
