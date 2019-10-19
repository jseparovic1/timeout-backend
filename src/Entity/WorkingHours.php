<?php

declare(strict_types=1);

namespace App\Entity;

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

    public function getDay(): int
    {
        return $this->day;
    }

    public function getOpen(): DateTime
    {
        return $this->open;
    }

    public function getClosed(): DateTime
    {
        return $this->closed;
    }
}
