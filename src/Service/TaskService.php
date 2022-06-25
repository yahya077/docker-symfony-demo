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
        return $this->doctrine->getRepository(Task::class)->findAll();
    }

}
