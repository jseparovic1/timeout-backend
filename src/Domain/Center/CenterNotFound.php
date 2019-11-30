<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

use Phpro\ApiProblem\Exception\ApiProblemException;
use Phpro\ApiProblem\Http\NotFoundProblem;

class CenterNotFound extends NotFoundProblem
{
    public static function forSlug(string $slug)
    {
        throw new ApiProblemException(new static(
            sprintf('Center with slug %s was not found.', $slug)
        ));
    }
}
