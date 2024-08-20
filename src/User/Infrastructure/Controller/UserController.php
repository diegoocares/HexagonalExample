<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controller;

use Core\Container;
use Utils\QueryParams;
use Src\User\Aplication\UseCase\GetUsers;

class UserController
{
    public function __construct(
        private Container $container,
    ) {
    }

    public function index()
    {
        $param = QueryParams::query('param');
        $page = (int) QueryParams::query('page', '1');
        $perPage = (int) QueryParams::query('perPage', '16');
        $getUsers = $this->container->get(GetUsers::class);
        $users = $getUsers->execute();
        echo json_encode($users);
    }
}