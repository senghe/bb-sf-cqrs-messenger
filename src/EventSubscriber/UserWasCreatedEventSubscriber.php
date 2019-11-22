<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Event\UserWasCreatedEvent;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

final class UserWasCreatedEventSubscriber implements MessageSubscriberInterface
{
    public static function getHandledMessages(): iterable
    {
        return [UserWasCreatedEvent::class];
    }

    public function __invoke(UserWasCreatedEvent $event)
    {
        var_dump($event);
    }
}