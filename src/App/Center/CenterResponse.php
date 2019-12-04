<?php

declare(strict_types=1);

namespace Timeout\App\Center;

use Timeout\Domain\Center\Address;
use Timeout\Domain\Center\Center;
use Timeout\Domain\Center\Court;
use Timeout\Domain\Center\Facility;
use Timeout\Domain\Center\WorkingHours;
use Timeout\Domain\Sport\Sport;

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
