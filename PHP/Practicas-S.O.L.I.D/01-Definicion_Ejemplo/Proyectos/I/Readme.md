# Proyecto Restaurante - Principio de Segregación de Interfaces (ISP)

## ¿Qué es el Principio de Segregación de Interfaces?
Este principio nos dice que es mejor tener varias interfaces pequeñas y específicas que una sola interfaz grande y general. Es como en un restaurante: en lugar de tener un solo tipo de empleado que haga todo, tenemos diferentes roles con responsabilidades específicas.

## Ejemplo Práctico: El Restaurante

### Las Interfaces (Los Roles)
1. **ICocinero**
   - Cocinar
   - Preparar ingredientes
   - Revisar calidad

2. **IMesero**
   - Tomar orden
   - Servir mesa
   - Procesar pago

3. **ILimpieza**
   - Limpiar área
   - Desinfectar

### Los Empleados
1. **ChefPrincipal**
   - Solo implementa ICocinero
   - Se centra en la preparación de alimentos

2. **Mesero**
   - Implementa IMesero e ILimpieza
   - Puede atender mesas y mantener su área limpia

3. **Ayudante**
   - Solo implementa ILimpieza
   - Se especializa en mantener todo limpio

## ¿Por qué es Mejor Así?

Imagina si tuviéramos una sola interfaz grande llamada `IEmpleadoRestaurante` con todos los métodos:
- El Chef tendría que implementar métodos de limpieza que no usa
- El Ayudante tendría que implementar métodos de cocina que no necesita
- Sería como pedirle a todos que hagan todo, lo cual no es realista

## Beneficios en la Vida Real

1. **Especialización**
   - Cada empleado se centra en lo que sabe hacer mejor
   - No se fuerza a nadie a implementar funciones que no necesita

2. **Flexibilidad**
   - Fácil agregar nuevos tipos de empleados
   - Fácil modificar responsabilidades

3. **Claridad**
   - Cada rol está bien definido
   - Las responsabilidades están claras

## Estructura del Proyecto
```
proyecto-isp/
├── interfaces/
│   ├── ICocinero.php
│   ├── IMesero.php
│   └── ILimpieza.php
├── empleados/
│   ├── ChefPrincipal.php
│   ├── Mesero.php
│   └── Ayudante.php
├── restaurante/
│   └── Restaurante.php
└── index.php
```

## Cómo Usar el Proyecto

1. Coloca los archivos en tu servidor web
2. Accede a index.php
3. Verás las diferentes actividades de cada empleado

## Ejemplo de la Vida Real

Es como cuando vas a un restaurante:
- Los chefs solo cocinan
- Los meseros atienden mesas y mantienen su área
- Los ayudantes mantienen todo limpio
- Nadie tiene que hacer tareas para las que no está preparado

## Cómo Agregar Nuevos Roles

Si quieres agregar un nuevo tipo de empleado, por ejemplo, un Bartender:

```php
interface IBartender {
    public function prepararBebidas(): string;
    public function manejarBar(): string;
}

class Bartender implements IBartender, ILimpieza {
    // Implementar métodos
}
```

## Conclusión
Este principio nos ayuda a organizar mejor el código, tal como un restaurante organiza a sus empleados por roles específicos.