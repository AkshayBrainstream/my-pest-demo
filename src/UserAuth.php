<?php

namespace App;

class UserAuth {
    protected $users = [];

    public function register(string $username, string $password): bool {
        if ($this->findUser($username)) {
            // User already exists
            return false;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Add the user
        $this->users[] = ['username' => $username, 'password' => $hashedPassword];
        return true;
    }

    public function login(string $username, string $password): bool {
        $user = $this->findUser($username);
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct
            // Here, you'd typically start a session
            return true;
        }
        return false;
    }

    protected function findUser(string $username): ?array {
        foreach ($this->users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }
}
