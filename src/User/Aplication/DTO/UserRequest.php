<?php

declare(strict_types=1);

namespace Src\User\Aplication\DTO;

class UserRequest
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
        $this->validateEmail($email);
    }

    public function validateEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email format.");
        }

        $allowedDomains = ['easyhotel.pe'];
        $emailDomain = substr(strrchr($email, "@"), 1);

        if (!in_array($emailDomain, $allowedDomains)) {
            throw new \InvalidArgumentException("Email domain is not allowed.");
        }
    }
}