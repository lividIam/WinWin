<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController {
    
    /**
     * @Route("/register", name="register_customer")
     * @Method({"GET", "POST"})
     */
    public function registerCustomerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        
        $customer = new Customer();
        
        $form = $this->createForm(CustomerType::class, $customer);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $password = $passwordEncoder->encodePassword($customer, $customer->getPassword());
            $customer->setPassword($password);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($customer);
            $entityManager->flush();
            
            return $this->render('security/login_customer.html.twig', []);
        }
        
        return $this->render('security/register_customer.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="login_customer")
     */
    public function loginCustomerAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login_customer.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
    
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }
}