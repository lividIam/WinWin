<?php

namespace App\DataFixtures;

use App\Entity\User;
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
        
        $user = new User();
        $user->setName('Mariano');
        $user->setSurname('Italiano');
        $user->setEmail('mariano.italiano@gmail.com');
        $user->setPhoneNumber('111222333');
        $password = $this->encoder->encodePassword($user, 'lalalalala');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}