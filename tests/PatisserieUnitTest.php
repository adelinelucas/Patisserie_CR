<?php

namespace App\Tests;

use App\Entity\Patisserie;
use App\Entity\User;
use App\Entity\Categorie;
use DateTime;
use PHPUnit\Framework\TestCase;


class PatisserieUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $patisserie = new Patisserie();
        $dateTime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $patisserie->setNom('nom')
            ->setCollection('collection')
            ->setPrix(20.20)
            ->setCreatedAt($dateTime)
            ->setDescription('description')
            ->setPortfolio('true')
            ->setSlug('slug')
            ->setFile('file')
            ->setPortionPersonne('portionPersonne')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertTrue($patisserie->getNom() === 'nom');
        $this->assertTrue($patisserie->getCollection() === 'collection');
        $this->assertTrue($patisserie->getPrix() === 20.20);
        $this->assertTrue($patisserie->getCreatedAt() === $dateTime);
        $this->assertTrue($patisserie->getDescription() === 'description');
        $this->assertTrue($patisserie->getPortfolio() === true);
        $this->assertTrue($patisserie->getSlug() === 'slug');
        $this->assertTrue($patisserie->getFile() === 'file');
        $this->assertTrue($patisserie->getPortionPersonne() === 'portionPersonne');
        $this->assertContains($categorie, $patisserie->getCategorie());
        $this->assertTrue($patisserie->getUser() === $user);
    }

    public function testIsFalse()
    {
        $patisserie = new Patisserie();
        $dateTime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $patisserie->setNom('nom')
            ->setCollection('collection')
            ->setPrix(20.20)
            ->setCreatedAt($dateTime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->setPortionPersonne('portionPersonne')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertFalse($patisserie->getNom() === 'false');
        $this->assertFalse($patisserie->getCollection() === 'false');
        $this->assertFalse($patisserie->getPrix() === 22.20);
        $this->assertFalse($patisserie->getCreatedAt() === new Datetime());
        $this->assertFalse($patisserie->getDescription() === 'false');
        $this->assertFalse($patisserie->getPortfolio() === false);
        $this->assertFalse($patisserie->getSlug() === 'false');
        $this->assertFalse($patisserie->getFile() === 'false');
        $this->assertFalse($patisserie->getPortionPersonne() === 'false');
        $this->assertNotContains(new Categorie(), $patisserie->getCategorie());
        $this->assertFalse($patisserie->getUser() === new User());
    }

    public function testIsEmpty() 
    {
        $patisserie = new Patisserie();

        $this->assertEmpty($patisserie->getNom());
        $this->assertEmpty($patisserie->getCollection());
        $this->assertEmpty($patisserie->getPrix());
        $this->assertEmpty($patisserie->getCreatedAt());
        $this->assertEmpty($patisserie->getDescription());
        $this->assertEmpty($patisserie->getPortfolio());
        $this->assertEmpty($patisserie->getSlug());
        $this->assertEmpty($patisserie->getFile());
        $this->assertEmpty($patisserie->getPortionPersonne());
        $this->assertEmpty($patisserie->getCategorie());
        $this->assertEmpty($patisserie->getUser());
    }
}
