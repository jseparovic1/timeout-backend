<?php

declare(strict_types=1);

namespace App\Timeout\Sport;

use App\Shared\Exception\NotFoundException;

class SportNotFound extends NotFoundException
{
    public static function for(int $sport): SportNotFound
    {
        /** @var SportNotFound $exception */
        $exception = static::create(
            sprintf('Sport with identifier %d was not found.', $sport)
        );

        return $exception;
    }
}
