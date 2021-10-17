<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AProposFunctionnalTest extends WebTestCase
{
    public function testShouldDisplayAPropos()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/aPropos');

        $this->assertResponseIsSuccessful();
    }
}
