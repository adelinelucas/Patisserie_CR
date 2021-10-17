<?php

namespace App\Controller;

use App\Entity\Blogpost;
use App\Repository\BlogpostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogpostController extends AbstractController
{
    /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites(
        Request $request,
        BlogpostRepository $blogpostRepository,
        PaginatorInterface $paginator
    ): Response {
        $data = $blogpostRepository->findBy([], ['id' => 'DESC']);

        $actualites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('blogpost/actualites.html.twig', [
            'actualites' => $actualites,
        ]);
    }

    /**
     * @Route("/actualites/{slug}", name="actualites_detail")
     */
    public function details(Blogpost $actualite): Response
    {
        return $this->render('blogpost/details.html.twig', [
            'actualite' => $actualite
        ]);
    }
}
