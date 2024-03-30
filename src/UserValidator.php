<?php

namespace App;

class UserValidator {
    public function validateName(string $name): bool {
        return !empty($name) && strlen($name) >= 2;
    }

    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validateEmailPattern(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validatePassword(string $password): bool {
        return strlen($password) >= 8;
    }


    public function validatePhoneNumberPattern(string $phoneNumber): bool {
        return preg_match('/^\+\d{10}$/', $phoneNumber) === 1;
    }

    public function validateAll(string $name, string $email, string $password): array {
        return [
            'name' => $this->validateName($name),
            'email' => $this->validateEmail($email),
            'password' => $this->validatePassword($password),
        ];
    }
}