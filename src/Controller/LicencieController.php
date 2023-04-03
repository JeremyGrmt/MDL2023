<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CallApiService;

#[Route('/licencie', name: 'app_licencie')]
class LicencieController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function licencie(CallApiService $callApiService): Response
    {
        $data = $callApiService->getAPI('licencies')['hydra:member'];
        return $this->render('licencie/index.html.twig', [
            'data' => $data
        ]);
    }
    
    #[Route('/{id}', name: '_unique')]
    public function licencieUnique(CallApiService $callApiService, int $id): Response
    {
        $data = $callApiService->getAPI('licencies', $id);
        return $this->render('licencie/index.html.twig', [
            'data' => $data
        ]);
    }
}
