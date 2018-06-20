<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Admin;
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
        
        // load User section
        $user = new User();
        $user->setName('Mariano');
        $user->setSurname('Italiano');
        $user->setEmail('mariano.italiano@gmail.com');
        $user->setPhoneNumber('111222333');
        $userPassword = $this->encoder->encodePassword($user, 'lalalalala');
        $user->setPassword($userPassword);
        
        $manager->persist($user);
        
        
        // load Admin section
        $admin = new Admin();
        $admin->setEmail('mark.korcz@gmail.com');
        $adminPassword = $this->encoder->encodePassword($admin, 'lalalalala');
        $admin->setPassword($adminPassword);
        
        $manager->persist($admin);
        
        
        $manager->flush();
    }
}