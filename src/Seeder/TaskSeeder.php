<?php

namespace App\Seeder;

use App\Entity\Task;
use App\Service\ProviderService;
use Doctrine\ORM\EntityManagerInterface;

class TaskSeeder {

    public static function seed(EntityManagerInterface $entityManager, $provider='firstProvider')
    {
        $service = new ProviderService();
        switch ($provider)
        {
            case 'secondProvider';
                $response = $service->getSecondProviderResponse();
                break;
            default:
                $response = $service->getFirstProviderResponse();
                break;
        }

        foreach ($response as $task)
        {
            $taskEntity = new Task();

            $taskEntity->setName($task['name']);
            $taskEntity->setHours($task['hours']);
            $taskEntity->setDifficulty($task['difficulty']);

            $entityManager->persist($taskEntity);
            $entityManager->flush();
        }
    }
}
