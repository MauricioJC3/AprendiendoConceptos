<?php

require_once __DIR__ . '/Model/User.php';
require_once __DIR__ . '/Services/UserValidator.php';
require_once __DIR__ . '/Services/UserRepository.php';
require_once __DIR__ . '/Services/UserNotifier.php';

// Crear una instancia de usuario
$user = new User("Juan Pérez", "juan@ejemplo.com");

// Crear instancias de los servicios
$validator = new UserValidator();
$repository = new UserRepository();
$notifier = new UserNotifier();

// Procesar el usuario
if ($validator->validateUser($user)) {
    $repository->save($user);
    $notifier->sendWelcomeEmail($user);
    echo "Usuario registrado exitosamente<br>";
} else {
    echo "Datos de usuario inválidos<br>";
}

// Probar con un usuario inválido
$invalidUser = new User("A", "correo-invalido");
if ($validator->validateUser($invalidUser)) {
    $repository->save($invalidUser);
    $notifier->sendWelcomeEmail($invalidUser);
} else {
    echo "Datos de usuario inválidos para el segundo usuario<br>";
}