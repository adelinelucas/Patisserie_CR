<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\PatisserieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('portfolio/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/portfolio/{slug}", name="portfolio_categorie")
     */
    public function categorieRender(Categorie $categorie, PatisserieRepository $patisserieRepository): Response
    {
        $patisseries = $patisserieRepository->findAllPortfolio($categorie);

        return $this->render('portfolio/portfolio_categorie.html.twig', [
            'categorie' => $categorie,
            'patisseries' => $patisseries,
        ]);
    }
}
