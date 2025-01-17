<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

use Timeout\Domain\Sport\Sport;

class Inquiry
{
    /** @var int */
    private $id;

    /** @var InquirySender */
    private $sender;

    /** @var string */
    private $message;

    /** @var Center */
    private $center;

    /** @var Sport */
    private $sport;

    public function __construct(InquirySender $sender, string $message, Center $center, Sport $sport)
    {
        $this->sender = $sender;
        $this->message = $message;
        $this->sport = $sport;
        $this->center = $center;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSender(): InquirySender
    {
        return $this->sender;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCenter(): Center
    {
        return $this->center;
    }

    public function getSport(): Sport
    {
        return $this->sport;
    }
}
