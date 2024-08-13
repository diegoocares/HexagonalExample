<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Persistence;

use Src\User\Domain\Model\User;
use Src\User\Domain\Repository\UserRepositoryInterface;

class MySQLUserRespository implements UserRepositoryInterface
{
    public function getAll(): array
    {
        // Implementación para obtener todos los usuarios
        $user = new User(
            id: 1,
            email: 'diegoocares02@gmail.com',
            password: '',
            photoUrl: null,
        );
        return [$user];
    }

    public function getById(int $userId): ?User
    {
        // Implementación para obtener un usuario por ID
        return null;
    }

    public function register(string $email, string $password): void
    {
        // Implementación para registrar un usuario
    }

    public function updateEmail(int $userId, string $email): void
    {
        // Implementación para actualizar el email de un usuario
    }

    public function updatePassword(int $userId, string $password): void
    {
        // Implementación para actualizar la contraseña de un usuario
    }

    public function updatePhotoUrl(int $userId, string $newPhotoUrl): void
    {
        // Implementación para actualizar la URL de la foto de un usuario
    }

    public function delete(int $userId): void
    {
        // Implementación para eliminar un usuario
    }

}