<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    private $client = null;
    
    public function setUp()
    {
        $this->client = static::createClient();
    }
    
    public function testUserRegisterPageShow()
    {
        $crawler = $this->client->request('GET', '/register');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Register Page")')->count());
    }
    
    public function testUserLoginPageShow()
    {
        $crawler = $this->client->request('GET', '/login');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Login Page")')->count());
    }
    
    public function testUserLoginAction()
    {
        $crawler = $this->client->request('GET', '/login');    
        
        $form = $crawler->selectButton('login')->form([
            '_username' => 'mariano.italiano@gmail.com',
            '_password' => 'lalalalala'
        ]);
        
        $this->client->submit($form);
        
        $this->client->followRedirect();
        
        $this->assertContains('Homepage', $this->client->getResponse()->getContent());
    }
    
    public function testUserRegistration()
    {
        $crawler = $this->client->request('GET', '/register');

        $form = $crawler->selectButton('Submit')->form([
            'user[name]'                => 'Dawid',
            'user[surname]'             => 'Podsiadlo',
            'user[email]'               => 'dawid.podsiadlo@gmail.com',
            'user[phoneNumber]'         => '113653623',
            'user[password][first]'     => 'lalalalala',
            'user[password][second]'    => 'lalalalala'
        ]);

        $this->client->submit($form);
        
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Login Page', $this->client->getResponse()->getContent());
    }
}