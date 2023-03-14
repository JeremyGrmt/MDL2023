<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ateliers', name: 'atelier_')]
class AteliersController extends AbstractController
{
    #[Route('/projetsClub', name: 'projet')]
    public function index(): Response
    {
        return $this->render('ateliers/index.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
    
    #[Route('/fonctionnementClub', name: 'fonctionprojet')]
    public function fonctionnementClub(): Response
    {
        return $this->render('ateliers/fonctionnementClub.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
    
    #[Route('/outilsClub', name: 'outilsclub')]
    public function outilsCLub(): Response
    {
        return $this->render('ateliers/outilsClub.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
    
    #[Route('/observatoire', name: 'observatoire')]
    public function observatoire(): Response
    {
        return $this->render('ateliers/observatoire.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
    
    #[Route('/iffe', name: 'iffe')]
    public function iffe(): Response
    {
        return $this->render('ateliers/iffe.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
    
    #[Route('/devDurable', name: 'devdurable')]
    public function devDurable(): Response
    {
        return $this->render('ateliers/devdurable.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
}
