<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginFunctionnalTest extends WebTestCase
{
    public function testShouldDisplayLoginPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
    }

    public function testVisitingWhileLoggedIn()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $buttonCrawlerNode = $crawler->selectButton('Se connecter');
        $form = $buttonCrawlerNode->form();

        $form = $buttonCrawlerNode->form([
            'email' => 'user@test.com',
            'password'  => 'password',
        ]);

        $client->submit($form);

        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('div', 'Your are logged in as user@test.com');
    }
}
