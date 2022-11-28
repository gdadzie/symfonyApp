<?php

namespace App\Controller\Admin;


use App\Entity\Apiclients;
use App\Entity\Apiclientsgrants;
use App\Entity\Apiinstallperm;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{



    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/dashboard.html.twig');
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<a class="navbar-brand" href="http://127.0.0.1:8000/home"> <span class="text-warning">ORANGE</span> <span class="text-info">BLEUE </span> </a>');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Compte utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Partenaires', 'fas fa-list', Apiclients::class);
        yield MenuItem::linkToCrud('Gérer les permissions', 'fas fa-list', Apiinstallperm::class);
        yield MenuItem::linkToCrud('Gérer les subventions', 'fas fa-list', Apiclientsgrants::class);
        yield MenuItem::linkToCrud('Permissions', 'fas fa-list', Apiclientsgrants::class);

    }
}
