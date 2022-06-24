<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController {

    /**
     * @Route("/firstProvider", name="app_first_provider")
     */
    public function index(): JsonResponse
    {
        $response = '';

        return new JsonResponse($response);
    }

}
