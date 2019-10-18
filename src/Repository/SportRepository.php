<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Sport;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method Sport|null find(string $id)
 * @method Sport|null findOneBy(array $criteria)
 * @method Sport[] findAll()
 */
class SportRepository extends Repository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, Sport::class);
    }
}
