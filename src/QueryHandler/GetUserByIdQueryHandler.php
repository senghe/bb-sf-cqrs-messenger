<?php

declare(strict_types=1);

namespace App\QueryHandler;

use App\Query\GetUserByIdQuery;
use App\ViewModel\UserViewModel;
use App\ViewModel\ViewModelInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetUserByIdQueryHandler implements MessageHandlerInterface
{
    public function __invoke(GetUserByIdQuery $query): ViewModelInterface
    {
        return new UserViewModel("senghe@gmail.com", "Marcin");
    }
}