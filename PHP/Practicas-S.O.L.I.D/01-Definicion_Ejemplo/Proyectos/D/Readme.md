# Sistema de Notificaciones - Principio de Inversión de Dependencias (DIP)

## ¿Qué es el Principio de Inversión de Dependencias?

El DIP establece dos reglas principales:
1. Los módulos de alto nivel no deben depender de módulos de bajo nivel. Ambos deben depender de abstracciones.
2. Las abstracciones no deben depender de detalles. Los detalles deben depender de abstracciones.

## Explicación Simple

Imagina un control remoto universal:
- No depende directamente de un TV específico (módulo de bajo nivel)
- Depende de una interfaz estándar (abstracción)
- Cualquier TV que implemente esa interfaz funcionará con el control

## Estructura del Proyecto
```
proyecto-dip/
├── interfaces/
│   ├── INotificador.php
│   └── ILogger.php
├── notificadores/
│   ├── NotificadorEmail.php
│   ├── NotificadorSMS.php
│   └── NotificadorWhatsApp.php
├── loggers/
│   └── ConsoleLogger.php
├── servicios/
│   └── ServicioNotificaciones.php
└── index.php
```

## ¿Cómo Funciona?

### 1. Abstracciones (Interfaces)
- `INotificador`: Define cómo se debe enviar una notificación
- `ILogger`: Define cómo se debe registrar un mensaje

### 2. Implementaciones Concretas
- Email, SMS, WhatsApp: Diferentes formas de enviar notificaciones
- ConsoleLogger: Una forma de registrar mensajes

### 3. Servicio de Alto Nivel
- `ServicioNotificaciones`: Usa las interfaces, no las implementaciones concretas

## Beneficios en la Vida Real

1. **Flexibilidad**
   - Puedes cambiar el método de notificación sin modificar el código
   - Como cambiar una batería en un control remoto

2. **Mantenibilidad**
   - Cada parte es independiente
   - Puedes actualizar una parte sin afectar las otras

3. **Pruebas**
   - Fácil de probar con implementaciones simuladas
   - Como probar un control remoto con un TV de prueba

## Ejemplo de Uso

```php
// Crear los componentes
$notificador = new NotificadorEmail();
$logger = new ConsoleLogger();

// Crear el servicio
$servicio = new ServicioNotificaciones($notificador, $logger);

// Enviar notificación
$servicio->enviarNotificacion("usuario@email.com", "¡Hola!");
```

## Cómo Agregar Nuevos Tipos de Notificaciones

1. Crear nueva clase implementando INotificador:
```php
class NotificadorTelegram implements INotificador {
    public function enviar(string $destinatario, string $mensaje): string {
        return "Telegram enviado a {$destinatario}: {$mensaje}";
    }
}
```

2. Usar la nueva implementación:
```php
$notificadorTelegram = new NotificadorTelegram();
$servicioTelegram = new ServicioNotificaciones($notificadorTelegram, $logger);
```

## Analogía con la Vida Real

Es como un enchufe eléctrico:
- El enchufe es la interfaz (abstracción)
- Los aparatos eléctricos son las implementaciones
- La corriente eléctrica no necesita saber qué está conectado
- Cualquier aparato que cumpla con el estándar funcionará

## Conclusión

El DIP nos permite:
- Crear sistemas flexibles
- Cambiar implementaciones fácilmente
- Mantener el código organizado y mantenible