<?php

declare(strict_types=1);

namespace Timeout\Framework\Exception;

use Phpro\ApiProblem\Exception\ApiProblemException;
use Phpro\ApiProblem\Http\HttpApiProblem;

class RuntimeException extends ApiProblemException
{
    public static function create(string $message, array $additional = []): RuntimeException
    {
        return new static(
            new HttpApiProblem(500,
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
