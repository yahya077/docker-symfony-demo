<?php

namespace App\Controller;

use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController {

    private TaskService $taskService;

    public function __construct(TaskService $taskService){
        $this->taskService = $taskService;
    }

    /**
     * @Route("/tasks", name="app_tasks")
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse($this->taskService->all());
    }

}
