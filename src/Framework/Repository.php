<?php

declare(strict_types=1);

namespace Timeout\Framework;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

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
