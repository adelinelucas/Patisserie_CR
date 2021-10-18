<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogpostFunctionnalTest extends WebTestCase
{
    public function testShouldDisplayBlogpost()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/actualites');

        $this->assertResponseIsSuccessful();
    }

    // public function testShouldDisplayOneBlogpost()
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/actualites/blogpost-test');

    //     $this->assertResponseIsSuccessful();
    // }
}
