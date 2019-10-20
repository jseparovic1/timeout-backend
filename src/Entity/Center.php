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
    private $workingHours;

    /**
     * @param Sport[] $sports
     * @param WorkingHours[] $workingHours
     */
    public function __construct(
        string $name,
        string $description,
        string $email,
        string $phone,
        Address $address,
        array $workingHours,
        ?string $slug = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;

        $this->workingHours = (new ArrayCollection($workingHours))->map(function (WorkingHours $workingHours) {
            $workingHours->associateToCenter($this);

            return $workingHours;
        });

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
        if ($this->courts->contains($court)) {
            return;
        }

        $court->associateToCenter($this);

        $this->courts->add($court);
    }

    /**
     * @return Court[]
     */
    public function getCourts(): array
    {
        return $this->courts->toArray();
    }

    /**
     * @return WorkingHours[]
     */
    public function getWorkingHours(): array
    {
        return $this->workingHours->toArray();
    }

    public function getCover(): string
    {
        return 'https://www.glaspodravine.hr/wp-content/uploads/2019/01/1Q7A2279-750x500.jpg';
    }
}
