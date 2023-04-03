<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LoginType;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(LoginType::class);
         $form->handleRequest($request);

        return $this->render('login/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'LoginController',
        ]);
    }
        
    #[Route('/logout', name: 'app_logout')]
    public function logout():void
    {
        
    }

}
