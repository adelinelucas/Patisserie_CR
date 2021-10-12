<?php

namespace App\Controller;

use App\Repository\PatisserieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PatisserieController extends AbstractController
{
    /**
     * @Route("/realisations", name="realisations")
     */
    public function realisations(
        Request $request,
        PatisserieRepository $patisserieRepository,
        PaginatorInterface $paginator
    ): Response {
        $data = $patisserieRepository->findAll();

        $patisseries = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('patisserie/realisations.html.twig', [
            'patisseries' => $patisseries,
        ]);
    }
}
