<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CallApiService;

#[Route('/qualite', name: 'app_qualite')]
class QualiteController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function qualite(CallApiService $callApiService): Response
    {
        $data = $callApiService->getAPI('qualites')['hydra:member'];
        return $this->render('qualite/index.html.twig', [
            'data' => $data
        ]);
    }
    
    #[Route('/{id}', name: '_unique')]
    public function qualiteUnique(CallApiService $callApiService, int $id): Response
    {
        $data = $callApiService->getAPI('qualites', $id);
        return $this->render('qualite/index.html.twig', [
            'data' => $data
        ]);
    }
}
