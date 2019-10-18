<?php

declare(strict_types=1);

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;

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

    /** @var ArrayCollection|Court[] */
    private $courts;

    public function __construct(
        int $id,
        string $name,
        string $description,
        string $email,
        string $phone,
        Address $address,
        ?string $slug = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->slug = (new Slugify())->slugify($name);
        $this->description = $description;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;

        if ($slug === null) {
            $this->slug = (new Slugify())->slugify($name);
        }

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

    /**
     * @return ArrayCollection|Court[]
     */
    public function getCourts()
    {
        return $this->courts;
    }
}
