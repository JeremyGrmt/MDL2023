<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CallApiService;

#[Route('/home', name: 'home_')]
class HomePageController extends AbstractController
{
    const DOMAINE_API = 'http://mdl-api.fr/';
    public function index(): Response
    {
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
    
    #[Route('/api', name:'api')]
 public function api(CallApiService $callApiService): Response
    {
        dd($callApiService->getFranceData());

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}



