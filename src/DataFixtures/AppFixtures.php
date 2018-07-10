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
use App\Utils\Slugger;
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
//        $user->setPhoneNumber('999666333');
//        $user->setStreet('Baltic st.');
//        $user->setStreetNumber('19');
//        $user->setBuildingNumber('7');
//        $user->setPostCode('752:47');
//        $user->setCity('SaltLakeCity');
        $userPassword = $this->encoder->encodePassword($user, 'lalalalala');
        $user->setPassword($userPassword);
        $manager->persist($user);
        
        $user2 = new User();
        $user2->setName('Ryszard');
        $user2->setSurname('Dab');
        $user2->setEmail('ryszard.dab@gmail.com');
//        $user->setPhoneNumber('999666333');
//        $user->setStreet('Atlantic st.');
//        $user->setStreetNumber('21');
//        $user->setBuildingNumber('3');
//        $user->setPostCode('555:666');
//        $user->setCity('BitterLakeCity');
        $userPassword2 = $this->encoder->encodePassword($user, 'lalalalala');
        $user2->setPassword($userPassword2);
        $manager->persist($user2);        
        
        
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
        $store->setSlug(Slugger::slugify('Tech Land'));
        $store->setLogo('logo.png');
        $store->setPhoneNumber('123642789');
        $store->setStreet('Sesameeee st.');
        $store->setStreetNumber('1333');
        $store->setBuildingNumber('2447');
        $store->setPostCode('523:13');
        $store->setCity('NewYorkCityyyyyyy');
        $store->setOwner($user);
        $manager->persist($store);
        
        $store2 = new Store();
        $store2->setName('Tech Landia');
        // need logic for adding picture
        $store2->setSlug(Slugger::slugify('Tech Landia'));
        $store2->setLogo('logooooo.png');
        $store2->setPhoneNumber('123654789');
        $store2->setStreet('Sesame st.');
        $store2->setStreetNumber('13');
        $store2->setBuildingNumber('27');
        $store2->setPostCode('527:23');
        $store2->setCity('NewYorkCity');
        $store2->setOwner($user);
        $manager->persist($store2);
        
        $store3 = new Store();
        $store3->setName('Loco Land');
        // need logic for adding picture
        $store3->setSlug(Slugger::slugify('Loco Land'));
        $store3->setLogo('logo-loco.png');
        $store3->setPhoneNumber('123642789');
        $store3->setStreet('Turkusowa st.');
        $store3->setStreetNumber('43434');
        $store3->setBuildingNumber('555');
        $store3->setPostCode('432:54');
        $store3->setCity('Nibylandia');
        $store3->setOwner($user2);
        $manager->persist($store3);
        
        
        // load Manufacturer detail
        $manufacturer = new Manufacturer();
        $manufacturer->setName('Apple');
        $manager->persist($manufacturer);
        
        $manufacturer2 = new Manufacturer();
        $manufacturer2->setName('Dell');
        $manager->persist($manufacturer2);
        
        
        // load Model detail
        $model = new Model();
        $model->setName('iPhone');
        $manager->persist($model);
        
        $model2 = new Model();
        $model2->setName('Inspiron');
        $manager->persist($model2);
        
        
        // load Version detail
        $version = new Version();
        $version->setName('6s');
        $manager->persist($version);
        
        $version2 = new Version();
        $version2->setName('15 5000');
        $manager->persist($version2);
        
        
        // load Color detail
        $color = new Color();
        $color->setName('red');
        $manager->persist($color);
        
        $color2 = new Color();
        $color2->setName('black');
        $manager->persist($color2);
        
        
        // load Shape detail
        $shape = new Shape();
        $shape->setName('square');
        $manager->persist($shape);
        
        $shape2 = new Shape();
        $shape2->setName('rectangular');
        $manager->persist($shape2);
        
        
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
        
        $productDetail2 = new Product_Details();
        $productDetail2->setManufacturer($manufacturer2);
        $productDetail2->setModel($model2);
        $productDetail2->setVersion($version2);
        $productDetail2->setColor($color2);
        $productDetail2->setShape($shape2);
        $productDetail2->setQuantity(20);
        $productDetail2->setPrice(1500);
        $manager->persist($productDetail2);
        
        
        // load Category
        $category = new Category();
        $category->setName('Mobile Phone');
        $category->setSlug(Slugger::slugify('Mobile Phone'));
        
        $category2 = new Category();
        $category2->setName('Personal Computer');
        $category2->setSlug(Slugger::slugify('Personal Computer'));
        
        // load Product
        $product = new Product();
        $product->setName('iPhone 6s');
        $product->setDescription('New Apple iPhone');
        $product->setProductDetail($productDetail);
        $product->setCategory($category);
        $product->setStore($store);
        $category->setProduct($product);
        $manager->persist($product);
        $manager->persist($category);
        
        $product2 = new Product();
        $product2->setName('Dell Inspiron 15 5000');
        $product2->setDescription('New Dell PC');
        $product2->setProductDetail($productDetail2);
        $product2->setCategory($category2);
        $product2->setStore($store);
        $category2->setProduct($product2);
        $manager->persist($product2);
        $manager->persist($category2);
        
        $manager->flush();
    }
}