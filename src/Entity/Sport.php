<?php

declare(strict_types=1);

namespace App\Entity;

use Cocur\Slugify\Slugify;

class Sport
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    public function __construct(int $id, string $name, string $slug)
    {
        $this->id = $id;
        $this->name = $name;

        if ($slug === null) {
            $slug = (new Slugify())->slugify($name);
        }

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

    public function getSlug(): string
    {
        return $this->slug;
    }
}
