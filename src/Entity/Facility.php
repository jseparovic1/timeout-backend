<?php

declare(strict_types=1);

namespace App\Entity;

class Facility
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $icon;

    /** @var Center */
    private $center;

    public function __construct(string $name, string $icon)
    {
        $this->name = $name;
        $this->icon = $icon;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function associateToCenter(Center $center): void
    {
        $this->center = $center;
    }
}
