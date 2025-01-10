<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Core\Container;
use Src\Shader\Infrastructure\Database\Connection;
use Src\User\Infrastructure\UserServiceProvider;
use Src\User\Domain\Service\UserServiceInterface;
use Src\User\Infrastructure\Service\S3UserService;
use Src\User\Domain\Repository\UserRepositoryInterface;
use Src\User\Infrastructure\Persistence\MySQLUserRespository;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Crear el contenedor
$container = new Container();

// Registrar los servicios de User como singletons
UserServiceProvider::register();

// Registrar en el contenedor las implementaciones de las interfaces usando los singletons del ServiceProvider
$container->set(UserRepositoryInterface::class, function() {
    return new MySQLUserRespository(new Connection());
});

$container->set(UserServiceInterface::class, function() {
    return new S3UserService();
});

return $container;