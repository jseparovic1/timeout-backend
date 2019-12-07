<?php

declare(strict_types=1);

namespace Timeout\App\User;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /** @var int */
    private $id;

    /** @var string */
    private $email;

    /** @var array */
    private $roles = [];

    /** @var string */
    private $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;

        $this->roles[] = 'ROLE_ADMIN';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * A visual identifier that represents this user.
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        return array_unique($this->roles);
    }

    public function getPassword(): string
    {
        return (string) $this->password;
    }

    /**
     * @see UserInterface
     */
    public function getSalt() {}

    /**
     * @see UserInterface
     */
    public function eraseCredentials() {}
}
