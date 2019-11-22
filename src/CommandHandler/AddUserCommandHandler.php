<?php

declare(strict_types=1);

namespace App\CommandHandler;

use App\Command\AddUserCommand;
use App\Event\UserWasCreatedEvent;
use App\EventRecorder\EventRecorderInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class AddUserCommandHandler implements MessageHandlerInterface
{
    /** @var EventRecorderInterface */
    private $eventRecorder;

    public function __construct(EventRecorderInterface $eventRecorder)
    {
        $this->eventRecorder = $eventRecorder;
    }

    public function __invoke(AddUserCommand $command)
    {
        var_dump($command);

        // user addition logic

        $event = new UserWasCreatedEvent(1);
        $this->eventRecorder->add($event);
    }
}