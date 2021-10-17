<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortfolioFunctionnalTest extends WebTestCase
{
    public function testShouldDisplayPortfolio()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio');

        $this->assertResponseIsSuccessful();
    }

    public function testShouldDisplayOnePatisserie()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/portfolio/categorie-test');

        $this->assertResponseIsSuccessful();
    }
}
