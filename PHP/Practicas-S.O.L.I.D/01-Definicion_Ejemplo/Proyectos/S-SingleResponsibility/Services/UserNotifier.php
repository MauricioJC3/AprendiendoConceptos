<?php

class UserNotifier {
    public function sendWelcomeEmail(User $user): void {
        echo "Enviando email de bienvenida a: " . $user->getEmail() . "<br>";
    }
}