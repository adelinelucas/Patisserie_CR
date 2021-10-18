<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\CategorieRepository;
use App\Repository\PatisserieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SiteMapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="siteMap", defaults={"_format"="xml"})
     */
    public function index(
        Request $request,
        PatisserieRepository $patisserieRepository,
        BlogpostRepository $blogpostRepository,
        CategorieRepository $categorieRepository
    ): Response {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];

        $urls[] = ['loc' => $this->generateUrl('home')];
        $urls[] = ['loc' => $this->generateUrl('realisations')];
        $urls[] = ['loc' => $this->generateUrl('actualites')];
        $urls[] = ['loc' => $this->generateUrl('portfolio')];
        $urls[] = ['loc' => $this->generateUrl('aPropos')];
        $urls[] = ['loc' => $this->generateUrl('contact')];

        foreach ($patisserieRepository->findAll() as $patisserie) {
            $urls[] = [
                'loc' => $this->generateUrl('realisations_details', ['slug' => $patisserie->getSlug()]),
                'lastmod' =>$patisserie->getCreatedAt()->format('Y-m-d')
            ];
        }

        foreach ($blogpostRepository->findAll() as $blogpost) {
            $urls[] = [
                'loc' => $this->generateUrl('actualites_detail', ['slug' => $blogpost->getSlug()]),
                'lastmod' =>$blogpost->getCreatedAt()->format('Y-m-d')
            ];
        }

        foreach ($categorieRepository->findAll() as $categorie) {
            $urls[] = [
                'loc' => $this->generateUrl('portfolio_categorie', ['slug' => $categorie->getSlug()]),
            ];
        }

        $response = new Response(
            $this->renderView('site_map/index.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname,
            ]),
            200
        );

        $response->headers->set('Content-type', 'text/xml');
        
        return $response;
    }
}
