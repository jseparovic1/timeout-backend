<?php

declare(strict_types=1);

namespace Timeout\Framework\Exception;

use Timeout\Framework\RequestGuard\PropertyPathConverter;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends UnprocessableEntityException
{
    public static function for(ConstraintViolationListInterface $constraintViolationList): UnprocessableEntityException
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

        return static::create(
            'Input validation failed.',
            [
                'validation_failures' => $violations
            ]
        );
    }
}
