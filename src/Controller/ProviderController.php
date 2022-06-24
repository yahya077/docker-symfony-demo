<?php

namespace App\Controller;

use App\Service\ProviderService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController {

    /**
     * @Route("/firstProvider", name="app_first_provider")
     * @param ProviderService $providerService
     * @return JsonResponse
     */
    public function index(ProviderService $providerService): JsonResponse
    {
        $response = $providerService->getFirstProviderResponse();
        return new JsonResponse($response);
    }

}
