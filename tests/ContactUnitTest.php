<?php

namespace App\Tests;

use DateTime;
use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $contact = new Contact();
        $dateTime = new DateTime();

        $contact->setNom('nom')
            ->setPrenom('prenom')
            ->setEmail('test@test.com')
            ->setMessage('message')
            ->setCreatedAt($dateTime)
            ->setIsSend(true);

        $this->assertTrue($contact->getNom() === 'nom');
        $this->assertTrue($contact->getPrenom() === 'prenom');
        $this->assertTrue($contact->getEmail() === 'test@test.com');
        $this->assertTrue($contact->getMessage() === 'message');
        $this->assertTrue($contact->getCreatedAt() === $dateTime);
        $this->assertTrue($contact->getIsSend() === true);
    }

    public function testIsFalse()
    {
        $contact = new Contact();
        $dateTime = new DateTime();

        $contact->setNom('nom')
            ->setPrenom('prenom')
            ->setEmail('test@test.com')
            ->setMessage('message')
            ->setCreatedAt($dateTime)
            ->setIsSend(true);
        
        $this->assertFalse($contact->getNom() === 'false');
        $this->assertFalse($contact->getPrenom() === 'false');
        $this->assertFalse($contact->getEmail() === 'false@test.com');
        $this->assertFalse($contact->getMessage() === 'false');
        $this->assertFalse($contact->getCreatedAt() === new Datetime());
        $this->assertFalse($contact->getIsSend() === false);
    }

    public function testIsEmpty() 
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getPrenom());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getCreatedAt());
        $this->assertEmpty($contact->getIsSend());
        $this->assertEmpty($contact->getId());
    }
}
