<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

class OpeningHour
{
    /** @var int */
    private $id;

    /**
     * @var int Day of the week 1-7
     */
    private $day;

    /** @var DateTimeImmutable */
    private $open;

    /** @var DateTimeImmutable */
    private $closed;

    public function __construct(int $day, DateTimeImmutable $open, DateTimeImmutable $closed)
    {
        $this->day = $day;
        $this->open = $open;
        $this->closed = $closed;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getOpen(): DateTimeImmutable
    {
        return $this->open;
    }

    public function getClosed(): DateTimeImmutable
    {
        return $this->closed;
    }
}
