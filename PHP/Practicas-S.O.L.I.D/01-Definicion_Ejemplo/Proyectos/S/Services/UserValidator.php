<?php

class UserValidator {
    public function validateUser(User $user): bool {
        return $this->validateEmail($user->getEmail()) && 
               $this->validateName($user->getName());
    }

    private function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function validateName(string $name): bool {
        return strlen($name) >= 2 && strlen($name) <= 50;
    }
}