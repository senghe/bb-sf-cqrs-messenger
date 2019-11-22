<?php

declare(strict_types=1);

namespace App\Middleware;

use App\EventRecorder\EventRecorderInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class HandleEventsMiddleware implements MiddlewareInterface
{
    /** @var MessageBusInterface */
    private $eventBus;

    /** @var EventRecorderInterface */
    private $eventRecorder;

    public function __construct(
        MessageBusInterface $eventBus,
        EventRecorderInterface $eventRecorder
    ) {
        $this->eventBus = $eventBus;
        $this->eventRecorder = $eventRecorder;
    }

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        try {
            $stack->next()->handle($envelope, $stack);
        } catch (\Throwable $exception) {
            $this->eventRecorder->reset();

            throw $exception;
        }

        $events = $this->eventRecorder->getAll();
        $this->eventRecorder->reset();

        foreach ($events as $event) {
            $this->eventBus->dispatch($event);
        }

        return $envelope;
    }
}