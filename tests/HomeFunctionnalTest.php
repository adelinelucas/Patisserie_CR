<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class HomeFunctionnalTest extends PantherTestCase
{
    public function testShouldDisplayHomepage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Patisserie Claire et Romain');
    }
}
