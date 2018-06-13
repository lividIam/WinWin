<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture 
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager) {
        
        $customer = new Customer();
        $customer->setCustomerName('Mariano');
        $customer->setCustomerSurname('Italiano');
        $customer->setEmail('mariano.italiano@gmail.com');
        $customer->setPhoneNumber('111222333');
        $password = $this->encoder->encodePassword($customer, 'lalalalala');
        $customer->setPassword($password);

        $manager->persist($customer);
        $manager->flush();
    }
}