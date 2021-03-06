<?php

namespace App\Tests;

use DateTime;
use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Commentaire;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new Blogpost();
        $dateTime = new DateTime();
        $user = new User();

        $blogpost->setTitre('titre')
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setCreatedAt($dateTime)
            ->setUser($user);

        $this->assertTrue($blogpost->getTitre() === 'titre');
        $this->assertTrue($blogpost->getContenu() === 'contenu');
        $this->assertTrue($blogpost->getSlug() === 'slug');
        $this->assertTrue($blogpost->getCreatedAt() === $dateTime);
        $this->assertTrue($blogpost->getUser() === $user);
    }

    public function testIsFalse()
    {
        $blogpost = new Blogpost();
        $dateTime = new DateTime();
        $user = new User();

        $blogpost->setTitre('titre')
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setCreatedAt($dateTime)
            ->setUser($user);

        $this->assertFalse($blogpost->getTitre() === 'false');
        $this->assertFalse($blogpost->getContenu() === 'false');
        $this->assertFalse($blogpost->getSlug() === 'false');
        $this->assertFalse($blogpost->getCreatedAt() === new Datetime());
        $this->assertFalse($blogpost->getUser() === new User());
    }

    public function testIsEmpty() 
    {
        $blogpost = new Blogpost();

        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getCreatedAt());
        $this->assertEmpty($blogpost->getUser());
        $this->assertEmpty($blogpost->getId());
    }

    public function testAddGetRemoveCommentaire() 
    {
        $blogpost = new Blogpost();
        $commentaire = new Commentaire();

        $this->assertEmpty($blogpost->getCommentaires());

        $blogpost->addCommentaire($commentaire);
        $this->assertContains($commentaire, $blogpost->getCommentaires());

        $blogpost->removeCommentaire($commentaire);
        $this->assertEmpty($blogpost->getCommentaires());
    }
}
