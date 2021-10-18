<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Patisserie;
use App\Entity\Commentaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Patisserie Claire et Romain');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('A Propos', 'fas fa-cog', User::class);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Blogpost::class);
        yield MenuItem::linkToCrud('Patisseries', 'fas fa-cookie', Patisserie::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment-dots', Commentaire::class);
    }
}
