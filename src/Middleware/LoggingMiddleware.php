<?php

declare(strict_types=1);

namespace App\Middleware;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

final class LoggingMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        var_dump("LoggingMiddleware was handled before next middleware");

        $stack->next()->handle($envelope, $stack);

        var_dump("LoggingMiddleware was handled after next middleware");

        return $envelope;
    }

}