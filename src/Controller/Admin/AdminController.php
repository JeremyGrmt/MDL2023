<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
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
        return $this->render('admin/adminboard.html.twig');
    }

    #[Route('/addatelier', name: 'fleuret')]
    public function addatelier() :Response
    {
        return $this->render('admin/addatelier.html.twig', [
            'controller_name' => 'DisciplinesController',
        ]);
    }
    
    #[Route('/addtheme', name: 'fleuret')]
    public function addtheme() :Response
    {
        return $this->render('disciplines/fleuret.html.twig', [
            'controller_name' => 'DisciplinesController',
        ]);
    }
    
    #[Route('/addvacation', name: 'fleuret')]
    public function addvacation() :Response
    {
        return $this->render('disciplines/fleuret.html.twig', [
            'controller_name' => 'DisciplinesController',
        ]);
    }
    
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MDL2023');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
