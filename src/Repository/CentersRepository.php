<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Center;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Center|null find(string $id)
 * @method Center|null findOneBy(array $criteria)
 */
class CentersRepository extends Repository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Center::class);
    }

    /**
     * @return Center[]
     */
    public function findAll(?string $sport = null): array
    {
        if ($sport === null) {
            return parent::findAll();
        }

        return $this->createQueryBuilder('center')
            ->leftJoin('center.courts', 'court')
            ->leftJoin('court.sport', 'sport')
            ->where('sport.slug = :sport')
            ->setParameter('sport', $sport)
            ->getQuery()
            ->getResult();
    }
}
