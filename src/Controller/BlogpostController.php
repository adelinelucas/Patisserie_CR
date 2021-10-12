<?php

namespace App\Controller;

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
        $data = $blogpostRepository->findAll();

        $actualites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('blogpost/actualites.html.twig', [
            'actualites' => $actualites,
        ]);
    }
}
