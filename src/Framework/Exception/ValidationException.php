<?php

declare(strict_types=1);

namespace Timeout\Framework\Exception;

use Phpro\ApiProblem\Exception\ApiProblemException;
use Timeout\Framework\RequestGuard\PropertyPathConverter;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException
{
    public static function for(ConstraintViolationListInterface $constraintViolationList): ApiProblemException
    {
        $violations = [];

        /** @var ConstraintViolation $violation */
        foreach ($constraintViolationList as $violation) {
            $propertyPath = $violation->getPropertyPath();

            if ($propertyPath !== null) {
                $notationConverter = new PropertyPathConverter();
                $propertyPath = $notationConverter->toDotNotation($propertyPath);
            }

            $violations[] = [
                'property' => $propertyPath,
                'message' => $violation->getMessage(),
            ];
        }

        return UnprocessableEntityException::create(
            'Input validation failed.',
            [
                'validation_failures' => $violations
            ]
        );
    }
}
