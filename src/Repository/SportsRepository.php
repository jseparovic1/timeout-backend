<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Sport;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sport|null find(string $id)
 * @method Sport|null findOneBy(array $criteria)
 * @method Sport[] findAll()
 */
class SportsRepository extends Repository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sport::class);
    }
}