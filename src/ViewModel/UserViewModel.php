<?php

declare(strict_types=1);

namespace App\ViewModel;

class UserViewModel implements ViewModelInterface
{
    /** @var string */
    private $email;

    /** @var string */
    private $name;

    public function __construct(string $email, string $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }
}