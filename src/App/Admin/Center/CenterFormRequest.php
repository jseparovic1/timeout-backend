<?php

declare(strict_types=1);

namespace Timeout\App\Admin\Center;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Timeout\Domain\Center\Address;
use Timeout\Domain\Center\Court;
use Timeout\Domain\Center\Facility;
use Timeout\Domain\Center\WorkingHours;

class CenterFormRequest
{
    /** @var int */
    private $id;

    /** @var string|null */
    private $name;

    /** @var string|null */
    private $slug;

    /** @var string|null */
    private $description;

    /** @var string|null */
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

    public function __construct()
    {
        $this->courts = new ArrayCollection();
        $this->workingHours = new ArrayCollection();
        $this->facilities = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    public function getCourts()
    {
        return $this->courts;
    }

    public function addCourt(Court $court): void
    {
        if ($this->courts->contains($court)) {
            return;
        }

        $this->courts->add($court);
    }

    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    public function addWorkingHours(WorkingHours $workingHours): void
    {
        if ($this->workingHours->contains($workingHours)) {
            return;
        }

        $this->workingHours->add($workingHours);
    }

    public function getFacilities()
    {
        return $this->facilities;
    }

    public function addFacility(Facility $facility): void
    {
        if ($this->facilities->contains($facility)) {
            return;
        }

        $this->facilities->add($facility);
    }
}
