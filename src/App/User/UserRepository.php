<?php

declare(strict_types=1);

namespace Timeout\App\User;

use Doctrine\Persistence\ManagerRegistry;
use Timeout\Framework\Repository;

class UserRepository extends Repository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }
}
