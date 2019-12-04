<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

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

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getCenter(): Center
    {
        return $this->center;
    }

    public function associateToCenter(): void
    {
        $this->center->addFacilities([$this]);
    }
}
