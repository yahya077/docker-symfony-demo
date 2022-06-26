<?php
namespace App\Service;

use App\Entity\Task;
use Doctrine\Persistence\ManagerRegistry;

class TaskService {
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }

    public function all():array
    {
        $data = $this->doctrine->getRepository(Task::class)->findAll();

        $products = [];

        foreach ($data as $product)
        {
            $products[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'difficulty' => $product->getDifficulty(),
                'hours' => $product->getHours(),
            ];
        }

        return $products;
    }

}
