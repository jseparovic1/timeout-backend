<?php

declare(strict_types=1);

namespace Timeout\Framework\Exception;

use Phpro\ApiProblem\Exception\ApiProblemException;
use Phpro\ApiProblem\Http\HttpApiProblem;

class NotFoundException
{
    public static function create(string $message, array $additional = []): ApiProblemException
    {
        return new ApiProblemException(
            new HttpApiProblem(404,
                array_merge(
                    [
                        'detail' => $message,
                    ],
                    $additional
                )
            )
        );
    }
}
