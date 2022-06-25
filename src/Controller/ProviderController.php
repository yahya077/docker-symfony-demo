<?php

namespace App\Controller;

use App\Service\ProviderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController extends AbstractController  {

    /**
     * @Route("/firstProvider", name="app_first_provider")
     * @param ProviderService $providerService
     * @return JsonResponse
     */
    public function first(ProviderService $providerService): JsonResponse
    {
        return new JsonResponse($providerService->getFirstProviderResponse());
    }
    /**
     * @Route("/secondProvider", name="app_second_provider")
     * @param ProviderService $providerService
     * @return JsonResponse
     */
    public function second(ProviderService $providerService): JsonResponse
    {
        return new JsonResponse($providerService->getSecondProviderResponse());
    }

}
