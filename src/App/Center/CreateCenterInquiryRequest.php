<?php

declare(strict_types=1);

namespace Timeout\App\Center;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;
use Timeout\Domain\Center\InquirySender;
use Timeout\Framework\RequestGuard\RequestGuard;

class CreateCenterInquiryRequest extends RequestGuard
{
    /** @var InquirySender */
    private $sender;

    /** @var string */
    private $message;

    /** @var int */
    private $sport;

    public function __construct(InquirySender $sender, string $message, int $sport)
    {
        $this->sender = $sender;
        $this->message = $message;
        $this->sport = $sport;
    }

    public function getContact(): InquirySender
    {
        return $this->sender;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getSport(): int
    {
        return $this->sport;
    }

    /**
     * @return <string, Constraint[]>
     */
    public static function getConstraints(): array
    {
        return [
            'sender' => [
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
}
