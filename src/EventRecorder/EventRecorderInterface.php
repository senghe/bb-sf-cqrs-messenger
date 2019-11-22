<?php

declare(strict_types=1);

namespace App\EventRecorder;

use App\Event\EventInterface;

interface EventRecorderInterface
{
    public function add(EventInterface $event): void;

    public function getAll(): array;

    public function reset(): void;
}