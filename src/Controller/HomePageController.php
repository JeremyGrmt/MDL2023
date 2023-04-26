<?php

namespace App\Controller;
use App\Entity\Atelier;
use App\Entity\Vacation;
use App\Entity\Theme;
use App\Entity\Hotel;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/home', name: 'home_')]
class HomePageController extends AbstractController
{
    const DOMAINE_API = 'http://mdl-api.fr/';
    public function index(ManagerRegistry $doctrine): Response
    {
        $ateliers = $doctrine->getRepository(Atelier::class)->findAll();
//        $hotel = $doctrine->getRepository($persistentObject)
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'ateliers' => $ateliers
        ]);
    }
    
}



