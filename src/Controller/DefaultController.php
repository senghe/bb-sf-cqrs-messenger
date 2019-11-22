<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\AddUserCommand;
use App\Query\GetUserByIdQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

final class DefaultController extends AbstractController
{
    /** @var MessageBusInterface */
    private $commandBus;

    /** @var MessageBusInterface */
    private $queryBus;

    public function __construct(
        MessageBusInterface $commandBus,
        MessageBusInterface $queryBus
    ) {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function index(Request $request): Response
    {
        $command = new AddUserCommand('senghe@gmail.com', "secret", "Marcin");
        $this->commandBus->dispatch($command);

        $query = new GetUserByIdQuery(1);
        $envelope = $this->queryBus->dispatch($query);

        $stamp = $envelope->last(HandledStamp::class);
        $viewModel = $stamp->getResult();

        return new Response('U mnie działa!');
    }

    public function query(Request $request): Response
    {
        $query = new GetUserByIdQuery(1);
        $envelope = $this->queryBus->dispatch($query);

        $stamp = $envelope->last(HandledStamp::class);
        $viewModel = $stamp->getResult();

        return new Response();
    }
}