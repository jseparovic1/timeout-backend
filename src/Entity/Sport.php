<?php

declare(strict_types=1);

namespace App\Entity;

class Sport
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /** @var string */
    private $icon;

    public function __construct(int $id, string $name, string $icon, string $slug)
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->slug = $slug;
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

    public function getSlug(): string
    {
        return $this->slug;
    }
}
