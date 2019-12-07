<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

use DateTimeImmutable;
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

    /** @var string|null */
    private $phone;

    /** @var Address */
    private $address;

    /** @var Court[]|Collection */
    private $courts;

    /** @var WorkingHours[]|Collection */
    private $workingHours;

    /** @var Facility[]|Collection */
    private $facilities;

    /** @var DateTimeImmutable */
    private $createdAt;

    /**
     * @param Facility[] $facilities
     * @param WorkingHours[] $workingHours
     */
    public function __construct(
        string $name,
        string $slug,
        string $description,
        string $email,
        ?string $phone,
        Address $address,
        array $workingHours = [],
        array $facilities = []
    ) {
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;

        $this->workingHours = new ArrayCollection();
        $this->facilities = new ArrayCollection();
        $this->courts = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();

        $this->addFacilities($facilities);
        $this->addWorkingHours($workingHours);
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

    public function getPhone(): ?string
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

    /**
     * @return Facility[]
     */
    public function getFacilities(): array
    {
        return $this->facilities->toArray();
    }

    public function getCover(): string
    {
        return 'https://www.glaspodravine.hr/wp-content/uploads/2019/01/1Q7A2279-750x500.jpg';
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param Facility[] $facilities
     */
    public function addFacilities(array $facilities): void
    {
        foreach ($facilities as $facility) {
            $facility->associateToCenter($this);

            $this->facilities->add($facility);
        }
    }

    /**
     * @param WorkingHours[] $workingHours
     */
    private function addWorkingHours(array $workingHours)
    {
        foreach ($workingHours as $workingHour) {
            $workingHour->associateToCenter($this);

            $this->workingHours->add($workingHour);
        }
    }

}
