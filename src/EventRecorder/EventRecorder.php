<?php

declare(strict_types=1);

namespace App\EventRecorder;

use App\Event\EventInterface;

final class EventRecorder implements EventRecorderInterface
{
    private $events = [];

    public function add(EventInterface $event): void
    {
        $this->events[] = $event;
    }

    public function getAll(): array
    {
        return $this->events;
    }

    public function reset(): void
    {
        $this->events = [];
    }

}