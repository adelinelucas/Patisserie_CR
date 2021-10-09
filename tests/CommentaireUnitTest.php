<?php

namespace App\Tests;

use App\Entity\Commentaire;
use App\Entity\Blogpost;
use App\Entity\Patisserie;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire = new Commentaire();
        $dateTime = new DateTime();
        $patisserie = new Patisserie();
        $blogpost = new Blogpost();

        $commentaire->setAuteur('auteur')
            ->setEmail('email@test.com')
            ->setContenu('contenu')
            ->setCreatedAt($dateTime)
            ->setPatisserie($patisserie)
            ->setBlogpost($blogpost);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'email@test.com');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getCreatedAt() === $dateTime);
        $this->assertTrue($commentaire->getPatisserie() === $patisserie);
        $this->assertTrue($commentaire->getBlogpost() === $blogpost);
    }

    public function testIsFalse()
    {
        $commentaire = new Commentaire();
        $dateTime = new DateTime();
        $patisserie = new Patisserie();
        $blogpost = new Blogpost();

        $commentaire->setAuteur('auteur')
            ->setEmail('email@test.com')
            ->setContenu('contenu')
            ->setCreatedAt($dateTime)
            ->setPatisserie($patisserie)
            ->setBlogpost($blogpost);
        
        $this->assertFalse($commentaire->getAuteur() === 'false');
        $this->assertFalse($commentaire->getEmail() === 'false@test.com');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getCreatedAt() === new Datetime());
        $this->assertFalse($commentaire->getPatisserie() === new Patisserie());
        $this->assertFalse($commentaire->getBlogpost() === new Blogpost());
    }

    public function testIsEmpty() 
    {
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getPatisserie());
        $this->assertEmpty($commentaire->getBlogpost());

    }
}
