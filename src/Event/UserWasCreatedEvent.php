<?php

declare(strict_types=1);

namespace App\Event;

final class UserWasCreatedEvent implements EventInterface
{
    /** @var int */
    private $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}