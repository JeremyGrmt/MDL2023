<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CallApiService;

#[Route('/club', name: 'app_club')]
class ClubController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function club(CallApiService $callApiService): Response
    {
        $data = $callApiService->getAPI('clubs')['hydra:member'];
        return $this->render('club/index.html.twig', [
            'data' => $data
        ]);
    }
    
    #[Route('/{id}', name: '_unique')]
    public function clubUnique(CallApiService $callApiService, int $id): Response
    {
        $data = $callApiService->getAPI('clubs', $id);
        return $this->render('club/index.html.twig', [
            'data' => $data
        ]);
    }
}
