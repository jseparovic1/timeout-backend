<?php

declare(strict_types=1);

namespace App\Timeout\Center;

use App\Shared\Repository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Inquiry|null find(int $id)
 * @method Inquiry|null findOneBy(array $criteria)
 */
class InquiriesRepository extends Repository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inquiry::class);
    }
}
