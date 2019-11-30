<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

use function sprintf;

class Coordinate
{
    /** @var string */
    private $latitude;

    /** @var string */
    private $longitude;

    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function __toString(): string
    {
        return sprintf('%s;%s', $this->getLatitude(), $this->getLongitude());
    }
}
