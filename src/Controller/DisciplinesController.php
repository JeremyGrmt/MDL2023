<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/disciplines', name: 'disciplines')]
class DisciplinesController extends AbstractController
{
    #[Route('/epee', name: 'epee')]
    public function index(): Response
    {
        return $this->render('disciplines/index.html.twig', [
            'controller_name' => 'DisciplinesController',
        ]);
    }
}
