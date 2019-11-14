<?php

declare(strict_types=1);

namespace App\Shared;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;

abstract class Repository extends ServiceEntityRepository
{
    /** @var EntityManager */
    protected $entityManager;

    public function __construct(ManagerRegistry $managerRegistry, string $entity)
    {
        $this->entityManager = $managerRegistry->getManager();

        parent::__construct($managerRegistry, $entity);

    }
    public function save(object $entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function remove(object $entity): void
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }
}
