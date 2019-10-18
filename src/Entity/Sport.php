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
            $this->slug = (new Slugify())->slugify($name);
        }
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
