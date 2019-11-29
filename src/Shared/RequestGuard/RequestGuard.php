<?php

declare(strict_types=1);

namespace App\Shared\RequestGuard;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

abstract class RequestGuard
{
    public static function buildConstraints(): Assert\Collection
    {
        return new Assert\Collection(static::getConstraints());
    }

    /**
     * @return <string, Constraint[]>
     */
    abstract public static function getConstraints(): array;
}
