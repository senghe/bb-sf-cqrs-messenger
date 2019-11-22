<?php

declare(strict_types=1);

namespace App\Command;

final class AddUserCommand
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $name;

    public function __construct(string $username, string $password, string $name)
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }
}