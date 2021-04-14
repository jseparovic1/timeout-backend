<?php

declare(strict_types=1);

namespace Timeout\Domain\Sport;

use Doctrine\Persistence\ManagerRegistry;
use Timeout\Domain\Center\Center;
use Timeout\Framework\Repository;

/**
 * @method Sport|null find(int $id)
 * @method Sport|null findOneBy(array $criteria)
 * @method Sport[] findAll()
 */
class SportsRepository extends Repository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sport::class);
    }

    /**
     * @return Sport[]
     */
    public function findByCenter(Center $center): array
    {
        return $this->createQueryBuilder('sport')
            ->leftJoin('sport.courts', 'court')
            ->where('court.center = :center')
            ->setParameter('center', $center)
            ->getQuery()
            ->getResult();
    }
}
