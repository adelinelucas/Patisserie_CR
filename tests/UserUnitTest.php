<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Patisserie;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram')
            ->setFacebook('facebook')
            ->setTelephone('023456789')
            ->setRoles(['ROLE_TEST']);

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getAPropos() === 'a propos');
        $this->assertTrue($user->getInstagram() === 'instagram');
        $this->assertTrue($user->getFacebook() === 'facebook');
        $this->assertTrue($user->getTelephone() === '023456789');
        $this->assertTrue($user->getRoles() === ['ROLE_TEST', 'ROLE_USER']);
    }

    public function testIsFalse()
    {
        $user= new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram')
            ->setFacebook('facebook')
            ->setTelephone('023456789');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getAPropos() === 'false');
        $this->assertFalse($user->getInstagram() === 'false');
        $this->assertFalse($user->getFacebook() === 'false');
        $this->assertFalse($user->getTelephone() === '123456789');
    }

    public function testIsEmpty() 
    {
        $user= new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getInstagram());
        $this->assertEmpty($user->getFacebook());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getId());
    }
    
    public function testAddGetRemovePatisserie() 
    {
        $user= new User();
        $patisserie = new Patisserie();

        $this->assertEmpty($user->getPatisseries());

        $user->addPatisseries($patisserie);
        $this->assertContains($patisserie, $user->getPatisseries());

        $user->removePatisseries($patisserie);
        $this->assertEmpty($user->getPatisseries());
    }

    public function testAddGetRemoveBlogpost() 
    {
        $user= new User();
        $blogpost = new Blogpost();

        $this->assertEmpty($user->getBlogposts());

        $user->addBlogpost($blogpost);
        $this->assertContains($blogpost, $user->getBlogposts());

        $user->removeBlogpost($blogpost);
        $this->assertEmpty($user->getBlogposts());
    }
}
