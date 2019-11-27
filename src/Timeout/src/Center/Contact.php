<?php

declare(strict_types=1);

namespace App\Timeout\Center;

class Contact
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $phone;

    public function __construct(string $name, string $email, string $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
}
