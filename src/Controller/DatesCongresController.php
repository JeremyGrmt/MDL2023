<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/datesCongres', name: 'dates_congres')]
class DatesCongresController extends AbstractController
{
    #[Route('/', name: 'dates_congres')]
    public function index(): Response
    {
        return $this->render('dates_congres/index.html.twig', [
            'controller_name' => 'DatesCongresController',
        ]);
    }
}
