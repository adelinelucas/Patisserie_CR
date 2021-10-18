<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PatisserieFunctionnalTest extends WebTestCase
{
    public function testShouldDisplayPatisserie()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisations');

        $this->assertResponseIsSuccessful();
    }

    // public function testShouldDisplayOnePatisserie()
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/realisations/patisserie-test');

    //     $this->assertResponseIsSuccessful();
    // }
}
