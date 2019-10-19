<?php

declare(strict_types=1);

namespace App\Entity;

class Address
{
    /** @var $id */
    private $id;

    /** @var string */
    private $street;

    /** @var string */
    private $city;

    /** @var string */
    private $latitude;

    /** @var string */
    private $longitude;

    public function __construct(string $street, string $city, string $latitude, string $longitude)
    {
        $this->street = $street;
        $this->city = $city;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCoordinates(): Coordinate
    {
        return new Coordinate(
            $this->latitude,
            $this->longitude
        );
    }
}
