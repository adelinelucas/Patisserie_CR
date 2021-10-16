<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Patisserie;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $categorie = new Categorie();

        $categorie->setNom('nom')
            ->setDescription('description')
            ->setSlug('slug');

        $this->assertTrue($categorie->getNom() === 'nom');
        $this->assertTrue($categorie->getDescription() === 'description');
        $this->assertTrue($categorie->getSlug() === 'slug');
    }

    public function testIsFalse()
    {
        $categorie= new Categorie();

        $categorie->setNom('nom')
            ->setDescription('description')
            ->setSlug('slug');

        $this->assertFalse($categorie->getNom() === 'false');
        $this->assertFalse($categorie->getDescription() === 'false');
        $this->assertFalse($categorie->getSlug() === 'false');
    }

    public function testIsEmpty() 
    {
        $categorie= new Categorie();

        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getDescription());
        $this->assertEmpty($categorie->getSlug());
        $this->assertEmpty($categorie->getId());
    }

    public function testAddGetRemovePatisserie() 
    {
        $categorie = new Categorie();
        $patisserie = new Patisserie();

        $this->assertEmpty($categorie->getPatisseries());

        $categorie->addPatisseries($patisserie);
        $this->assertContains($patisserie, $categorie->getPatisseries());

        $categorie->removePatisseries($patisserie);
        $this->assertEmpty($categorie->getPatisseries());
    }
}

