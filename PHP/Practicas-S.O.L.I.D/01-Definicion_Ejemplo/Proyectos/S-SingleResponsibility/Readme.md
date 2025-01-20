# Proyecto PHP - Principio de Responsabilidad Única (SRP)

Este proyecto demuestra la implementación práctica del primer principio SOLID: el Principio de Responsabilidad Única (Single Responsibility Principle - SRP) en PHP.

## ¿Qué es el Principio de Responsabilidad Única?

El SRP establece que una clase debe tener una única razón para cambiar, lo que significa que una clase debe tener solo una responsabilidad o trabajo específico.

## Estructura del Proyecto

```
proyecto-srp/
├── Model/
│   └── User.php
├── Services/
│   ├── UserValidator.php
│   ├── UserRepository.php
│   └── UserNotifier.php
└── index.php
```

## Orden de Desarrollo y Explicación Paso a Paso

### 1. Modelo (User.php)
Primero se creó el modelo User porque es la entidad principal que contiene los datos básicos:
- Define la estructura básica de un usuario
- Contiene solo propiedades (name, email)
- Implementa getters y setters
- No tiene lógica de negocio

```php
class User {
    private $name;
    private $email;
    // getters y setters
}
```

### 2. Validador (UserValidator.php)
Segundo, se creó el validador porque necesitamos asegurar que los datos sean correctos antes de cualquier operación:
- Se encarga únicamente de validar datos
- Verifica el formato del email
- Verifica la longitud del nombre
- No guarda ni modifica datos

### 3. Repositorio (UserRepository.php)
Tercero, se implementó el repositorio para manejar el almacenamiento:
- Solo se encarga de guardar y recuperar usuarios
- Simula una base de datos con un array
- No realiza validaciones
- No envía notificaciones

### 4. Notificador (UserNotifier.php)
Cuarto, se agregó el notificador para manejar las comunicaciones:
- Solo se encarga de enviar notificaciones
- Simula el envío de emails
- No modifica ni valida datos

### 5. Integración (index.php)
Finalmente, se creó el archivo index.php que integra todos los componentes:
- Requiere todos los archivos necesarios
- Crea instancias de las clases
- Demuestra el flujo completo de trabajo

## Cómo Funciona

1. Se crea un nuevo usuario con nombre y email
2. El validador verifica que los datos sean correctos
3. Si los datos son válidos:
   - El repositorio guarda el usuario
   - El notificador envía un email de bienvenida
4. Si los datos son inválidos:
   - Se muestra un mensaje de error

## Ejemplo de Uso

```php
// Crear usuario
$user = new User("Juan Pérez", "juan@ejemplo.com");

// Crear servicios
$validator = new UserValidator();
$repository = new UserRepository();
$notifier = new UserNotifier();

// Procesar usuario
if ($validator->validateUser($user)) {
    $repository->save($user);
    $notifier->sendWelcomeEmail($user);
    echo "Usuario registrado exitosamente";
} else {
    echo "Datos de usuario inválidos";
}
```

## Beneficios de esta Implementación

1. **Separación Clara de Responsabilidades**
   - Cada clase tiene un único propósito
   - El código es más fácil de mantener
   - Los cambios afectan solo a una clase

2. **Facilidad de Pruebas**
   - Cada componente puede probarse de forma aislada
   - No hay dependencias complejas

3. **Flexibilidad**
   - Fácil de modificar cada componente
   - Fácil de agregar nuevas funcionalidades
   - Fácil de reemplazar implementaciones