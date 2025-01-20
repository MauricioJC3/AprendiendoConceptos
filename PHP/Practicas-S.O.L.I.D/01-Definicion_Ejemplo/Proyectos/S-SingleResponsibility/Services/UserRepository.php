<?php

class UserRepository {
    private $users = [];

    public function save(User $user): void {
        $this->users[] = $user;
        echo "Usuario guardado en el repositorio<br>";
    }

    public function findByEmail(string $email): ?User {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    public function getAllUsers(): array {
        return $this->users;
    }
}