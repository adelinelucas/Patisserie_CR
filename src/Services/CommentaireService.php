<?php

namespace App\Services;

use DateTime;
use App\Entity\Blogpost;
use App\Entity\Patisserie;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class CommentaireService
{
    private $manager;
    private $flash;

    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flash)
    {
        $this->manager = $manager;
        $this->flash = $flash;
    }

    public function persistCommentaire(
        Commentaire $commentaire,
        Blogpost $blogpost = null,
        Patisserie $patisserie = null
        ): void {
        $commentaire->setIsPublished(false)
                ->setBlogpost($blogpost)
                ->setPatisserie($patisserie)
                ->setCreatedAt(new DateTime('now'));
        
        $this->manager->persist($commentaire);
        $this->manager->flush();
        $this->flash->add('success', 'Nous vous remercions pour l\'envoi de votre commentaire. Il sera publié après validation.');
    }
}
