<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Court
{
    /** @var $id */
    private $id;

    /** @var string */
    private $name;

    /** @var Collection|string[] */
    private $gallery;

    /** @var string */
    private $price;

    /** @var Center */
    private $center;

    public function __construct(
        int $id,
        string $name,
        string $price,
        array $pictures,
        Center $center
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->gallery = new ArrayCollection($pictures);
        $this->center = $center;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection|string[]
     */
    public function getGallery(): Collection
    {
        return $this->gallery;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}
