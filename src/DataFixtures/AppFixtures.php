<?php

namespace App\DataFixtures;

use App\Entity\Person\User;
use App\Entity\Person\Admin;
use App\Entity\Store\Store;
use App\Entity\Product\Product;
use App\Entity\Product\Category;
use App\Entity\Product\Product_Details;
use App\Entity\Product\Details\Manufacturer;
use App\Entity\Product\Details\Model;
use App\Entity\Product\Details\Version;
use App\Entity\Product\Details\Color;
use App\Entity\Product\Details\Shape;
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
        
        // load User
        $user = new User();
        $user->setName('Mariano');
        $user->setSurname('Italiano');
        $user->setEmail('mariano.italiano@gmail.com');
        $userPassword = $this->encoder->encodePassword($user, 'lalalalala');
        $user->setPassword($userPassword);
        
        $manager->persist($user);
        
        
        // load Admin
        $admin = new Admin();
        $admin->setEmail('mark.korcz@gmail.com');
        $adminPassword = $this->encoder->encodePassword($admin, 'lalalalala');
        $admin->setPassword($adminPassword);
        
        $manager->persist($admin);
        
        
        // load Store
        $store = new Store();
        $store->setName('Tech Land');
        // need logic for adding picture
        $store->setLogo('logo.png');
        $store->setOwner($user);
        
        $manager->persist($store);
        
        
        // load Manufacturer detail
        $manufacturer = new Manufacturer();
        $manufacturer->setName('Apple');
        
        $manager->persist($manufacturer);
        
        
        // load Model detail
        $model = new Model();
        $model->setName('iPhone');
        
        $manager->persist($model);
        
        
        // load Version detail
        $version = new Version();
        $version->setName('6s');
        
        $manager->persist($version);
        
        
        // load Color detail
        $color = new Color();
        $color->setName('red');
        
        $manager->persist($color);
        
        
        // load Shape detail
        $shape = new Shape();
        $shape->setName('square...');
        
        $manager->persist($shape);
        
        
        // load Product_Details
        $productDetail = new Product_Details();
        $productDetail->setManufacturer($manufacturer);
        $productDetail->setModel($model);
        $productDetail->setVersion($version);
        $productDetail->setColor($color);
        $productDetail->setShape($shape);
        $productDetail->setQuantity(12);
        $productDetail->setPrice(2000);
        
        $manager->persist($productDetail);
        
        
        // load Category
        $category = new Category();
        $category->setName('Mobile Phone');
        
        // load Product
        $product = new Product();
        $product->setName('iPhone 6s');
        $product->setDescription('New Apple iPhone');
        $product->setProductDetail($productDetail);
        $product->setCategory($category);
        $product->setStore($store);
        
        $category->setProduct($product);
        $manager->persist($category);
        
        $manager->persist($product);
        
        
        $manager->flush();
    }
}