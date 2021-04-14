<?php
declare(strict_types=1);

namespace Timeout\Domain\Center;

use Doctrine\Persistence\ManagerRegistry;
use Timeout\Framework\Repository;

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
