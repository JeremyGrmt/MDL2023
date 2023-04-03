<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hebergement', name: 'hebergement_')]
class HebergementController extends AbstractController
{
    #[Route('/', name: 'app_hebergement')]
    public function index(): Response
    {
        $formulestest = [
            [
                'id' => 1,
                'titre' => 'Formule 1',
                'description' => 'test formule 1',
                'prix' => 19.99,
            ],
            [
                'id' => 1,
                'titre' => 'Formule 2',
                'description' => 'test formule 2',
                'prix' => 29.99,
            ],
            [
                'id' => 1,
                'titre' => 'Formule 3',
                'description' => 'test formule 3',
                'prix' => 39.99,
            ],
        ];
        return $this->render('hebergement/index.html.twig', [
            'controller_name' => 'HebergementController',
            'formules' => $formulestest,
        ]);
    }
}
