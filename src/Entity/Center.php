<?php

declare(strict_types=1);

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Center
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /** @var string */
    private $description;

    /** @var string */
    private $email;

    /** @var string */
    private $phone;

    /** @var Address */
    private $address;

    /** @var Court[]|Collection */
    private $courts;

    /** @var WorkingHours[]|Collection */
    private $openingHours;

    public function __construct(
        string $name,
        string $description,
        string $email,
        string $phone,
        Address $address,
        array $openingHours,
        ?string $slug = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->openingHours = new ArrayCollection($openingHours);

        if ($slug === null) {
            $slug = (new Slugify())->slugify($name);
        }

        $this->slug = $slug;

        $this->courts = new ArrayCollection();
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function addCourt(Court $court): void
    {
        if (!$this->courts->contains($court)) {
            return;
        }

        $this->courts->add($court);
    }

    /**
     * @return Court[]
     */
    public function getCourts()
    {
        return $this->courts->toArray();
    }

    /**
     * @return WorkingHours[]
     */
    public function getOpeningHours(): array
    {
        return $this->openingHours->toArray();
    }
}
