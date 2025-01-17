<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

use DateTime;

class WorkingHours
{
    /** @var int */
    private $id;

    /**
     * @var int Day of the week 1-7
     */
    private $day;

    /** @var DateTime */
    private $open;

    /** @var DateTime */
    private $closed;

    /** @var Center */
    private $center;

    public function __construct(int $day, string $open, string $closed)
    {
        $this->day = $day;
        $this->open = DateTime::createFromFormat('H:i', $open);
        $this->closed = DateTime::createFromFormat('H:i', $closed);;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDay(): string
    {
        $days = [
            'PON',
            'UTO',
            'SRI',
            'ČET',
            'PET',
            'SUB',
            'NED'
        ];

        return $days[$this->day-1];
    }

    public function getOpen(): string
    {
        return $this->open->format('H:i');
    }

    public function getClosed(): string
    {
        return $this->closed->format('H:i');
    }

    public function associateToCenter(Center $center): void
    {
        $this->center = $center;
    }
}
