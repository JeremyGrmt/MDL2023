<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ateliers', name: 'app_ateliers')]
class AteliersController extends AbstractController
{
    #[Route('/projetsClub', name: 'app_ateliers')]
    public function index(): Response
    {
        return $this->render('ateliers/index.html.twig', [
            'controller_name' => 'AteliersController',
        ]);
    }
}
