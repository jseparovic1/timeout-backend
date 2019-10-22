<?php

declare(strict_types=1);

namespace App\Action;

use App\Entity\Address;
use App\Entity\Center;
use App\Entity\Court;
use App\Entity\Facility;
use App\Entity\Sport;
use App\Entity\WorkingHours;

class CenterResponse
{
    /** @var Center */
    private $center;

    /** @var Sport[]|array */
    private $sports;

    /**
     * @param Sport[] $sports
     */
    public function __construct(Center $center, array $sports)
    {
        $this->center = $center;
        $this->sports = $sports;
    }

    public function getId(): int
    {
        return $this->center->getId();
    }

    public function getName(): string
    {
        return $this->center->getName();
    }

    public function getSlug(): string
    {
        return $this->center->getSlug();
    }

    public function getDescription(): string
    {
        return $this->center->getDescription();
    }

    public function getEmail(): string
    {
        return $this->center->getEmail();
    }

    public function getPhone(): string
    {
        return $this->center->getPhone();
    }

    public function getAddress(): Address
    {
        return $this->center->getAddress();
    }

    /**
     * @return Court[]
     */
    public function getCourts(): array
    {
        return $this->center->getCourts();
    }

    /**
     * @return WorkingHours[]
     */
    public function getWorkingHours(): array
    {
        return $this->center->getWorkingHours();
    }

    /**
     * @return Facility[]
     */
    public function getFacilities(): array
    {
        return $this->center->getFacilities();
    }

    public function getCover(): string
    {
        return $this->center->getCover();
    }

    public function getSports()
    {
        return $this->sports;
    }
}
