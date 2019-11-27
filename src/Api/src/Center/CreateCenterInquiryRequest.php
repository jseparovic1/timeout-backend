<?php

declare(strict_types=1);

namespace App\Api\Center;

use App\Shared\RequestGuard\RequestGuard;
use App\Timeout\Center\Contact;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

class CreateCenterInquiryRequest extends RequestGuard
{
    /** @var Contact */
    private $contact;

    /** @var string */
    private $message;

    /** @var int */
    private $sport;

    public function __construct(Contact $contact, string $message, int $sport)
    {
        $this->contact = $contact;
        $this->message = $message;
        $this->sport = $sport;
    }

    /**
     * @return <string, Constraint[]>
     */
    public static function getConstraints(): array
    {
        return [
            'contact' => [
                new Assert\Collection([
                    'name' => [
                        new Assert\NotBlank(),
                        new Assert\Type('string')
                    ],
                    'email' => [
                        new Assert\NotBlank(),
                        new Assert\Email(['strict' => true])
                    ],
                    'phone' => [
                        new Assert\NotBlank(),
                        new Assert\Type('string')
                    ]
                ])
            ],
            'message' => [
                new Assert\NotBlank(),
                new Assert\Type('string'),
                new Assert\Length([
                    'min' => 5,
                    'max' => 255,
                ]),
            ],
            'sport' => [
                new Assert\NotBlank(),
                new Assert\Type('integer')
            ]
        ];
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getSport(): int
    {
        return $this->sport;
    }
}
