<?php

namespace App\Controller;

use App\Entity\Patisserie;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Services\CommentaireService;
use App\Repository\PatisserieRepository;
use App\Repository\CommentaireRepository;
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
        $data = $patisserieRepository->findBy([], ['id' => 'DESC']);

        $patisseries = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('patisserie/realisations.html.twig', [
            'patisseries' => $patisseries,
        ]);
    }
    
    /**
     * @Route("/realisations/{slug}", name="realisations_details")
     */
    public function details(
        Patisserie $patisserie,
        Request $request,
        CommentaireService $commentaireService,
        CommentaireRepository $commentaireRepository
    ): Response {

        $commentaires = $commentaireRepository->findCommentaires($patisserie);
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaire = $form->getData();
            $commentaireService->persistCommentaire($commentaire, null, $patisserie);

            return $this->redirectToRoute('realisations_details', ['slug' => $patisserie->getSlug()]);
        }
        return $this->render('patisserie/details.html.twig', [
            'patisserie' => $patisserie,
            'form' => $form->createView(),
            'commentaires' => $commentaires,
        ]);
    }
}
