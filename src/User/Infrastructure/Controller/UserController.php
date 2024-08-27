<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controller;

use Core\Container;
use Src\User\Aplication\DTO\UserRequest;
use Src\User\Aplication\UseCase\GetUser;
use Src\User\Aplication\UseCase\GetUsers;
use Src\User\Aplication\UseCase\RegisterUser;
use Src\Shader\Infrastructure\Utils\QueryParams;
use Src\Shader\Infrastructure\Utils\SuccessResponse;

class UserController
{
    public function __construct(
        private Container $container,
    ) {
    }

    public function index()
    {
        $email = QueryParams::query('email');
        $params['email'] = [
            'operator' => 'LIKE',
            'value' => $email,
        ];
        $getUsers = $this->container->get(GetUsers::class);
        $users = $getUsers->execute($params);
        SuccessResponse::response('OK', $users);
    }

    public function show(int $userId)
    {
        $getUser = $this->container->get(GetUser::class);
        $user = $getUser->execute($userId);
        SuccessResponse::response('OK', $user);
    }

    public function store()
    {
        $input = file_get_contents("php://input");
        $data = json_decode($input, true);
        $registerUser = $this->container->get(RegisterUser::class);

        $userRequest = new UserRequest(
            email: $data['email'],
            password: $data['password']
        );

        $registerUser->execute($userRequest);
        SuccessResponse::response('User registered successfully.');
    }
}
