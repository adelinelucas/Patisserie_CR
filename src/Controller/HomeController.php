<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\PatisserieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PatisserieRepository $patisserieRepository,BlogpostRepository $blogpostRepository ): Response
    {
        return $this->render('home/index.html.twig', [
            'patisseries' => $patisserieRepository->lastFive(),
            'blogposts'=> $blogpostRepository->lastFive(),
        ]);
    }
}
