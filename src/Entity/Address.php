<?php

declare(strict_types=1);

namespace App\Entity;

class Address
{
    /** @var string */
    private $street;

    /** @var string */
    private $city;

    /** @var string */
    private $latitude;

    /** @var string */
    private $longitude;

    public function __construct(string $street, string $city, Coordinate $coordinate)
    {
        $this->street = $street;
        $this->city = $city;
        $this->latitude = $coordinate->getLatitude();
        $this->longitude = $coordinate->getLatitude();
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
