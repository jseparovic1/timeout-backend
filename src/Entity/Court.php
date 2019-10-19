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

    /** @var string */
    private $price;

    /** @var string */
    private $description;

    /** @var Sport */
    private $sport;

    /** @var Center */
    private $center;

    /** @var Collection|string[] */
    private $gallery;

    public function __construct(
        string $name,
        string $price,
        string $description,
        Sport $sport,
        Center $center,
        ?array $pictures = []
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->sport = $sport;
        $this->center = $center;
        $this->gallery = new ArrayCollection($pictures);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSport(): Sport
    {
        return $this->sport;
    }

    public function getCenter(): Center
    {
        return $this->center;
    }

    /**
     * @return Collection|string[]
     */
    public function getGallery(): Collection
    {
        return $this->gallery;
    }
}
