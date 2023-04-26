<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/home', name: 'home_')]
class HomePageController extends AbstractController
{
    const DOMAINE_API = 'http://mdl-api.fr/';
    public function index(): Response
    {
        $compte = $this->getUser();
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'compte' => $compte,
        ]);
    }
    
}



