<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

abstract class Repository
{
    /** @var EntityRepository */
    protected $repository;

    public function __construct(EntityManagerInterface $entityManager, string $entity)
    {
        $this->repository = $entityManager->getRepository($entity);
    }

    public function find(string $id): ?object
    {
        return $this->repository->find($id);
    }

    public function findOneBy(array $criteria): ?object
    {
        return $this->repository->findOneBy($criteria);
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
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
