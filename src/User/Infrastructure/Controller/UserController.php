<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controller;

use Core\Container;
use Src\User\Aplication\UseCase\GetUsers;

class UserController
{
    public function __construct(
        private Container $container,
    ) {
    }

    public function index()
    {
        $getUsers = $this->container->get(GetUsers::class);
        $users = $getUsers->execute();
        echo json_encode($users);
    }
}