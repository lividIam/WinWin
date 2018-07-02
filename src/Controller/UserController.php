<?php

namespace App\Controller;

use App\Form\UserType;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function profileAddressAction(Request $request, UserService $userService)
    {
        $user = $this->getDoctrine()->getRepository('\App\Entity\Person\User')->findOneBy(array(
                'id' => $userService->getLoggedUser()
            ));
        
        $password = $user->getPassword();
        
        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $user->setPassword($password);
            
            $user->setPhoneNumber($form['phoneNumber']->getData());
            $user->setStreet($form['street']->getData());
            $user->setStreetNumber($form['streetNumber']->getData());
            $user->setBuildingNumber($form['buildingNumber']->getData());
            $user->setCity($form['city']->getData());
            $user->setPostCode($form['postCode']->getData());
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
            return $this->render('user/user_address.html.twig', array(
                'form' => $form->createView()
            ));
        }
        
        return $this->render('user/user_address.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
