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
    
    public function testCustomerRegisterPageShow()
    {
        $crawler = $this->client->request('GET', '/register');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Register Page")')->count());
    }
    
    public function testCustomerLoginPageShow()
    {
        $crawler = $this->client->request('GET', '/login');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Login Page")')->count());
    }
}