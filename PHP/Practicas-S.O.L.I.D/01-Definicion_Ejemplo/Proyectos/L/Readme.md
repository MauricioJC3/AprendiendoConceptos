# Proyecto PHP - Principio de Sustitución de Liskov (LSP)

## Descripción
Este proyecto demuestra la implementación del tercer principio SOLID: el Principio de Sustitución de Liskov (Liskov Substitution Principle).

## ¿Qué es el Principio de Sustitución de Liskov?
El LSP establece que los objetos de una clase derivada deben poder sustituir a los objetos de la clase base sin alterar el comportamiento correcto del programa.

## Estructura del Proyecto
```
proyecto-lsp/
├── shapes/
│   ├── Shape.php
│   ├── Rectangle.php
│   ├── Square.php
│   └── Circle.php
├── services/
│   └── AreaCalculator.php
└── index.php
```

## Implementación del LSP en este Proyecto

### 1. Clase Base Abstracta (Shape)
- Define el contrato base para todas las formas
- Establece métodos abstractos que todas las formas deben implementar
- Garantiza que todas las formas tengan comportamientos consistentes

### 2. Clases Derivadas
- Rectangle: Implementa un rectángulo
- Square: Implementa un cuadrado
- Circle: Implementa un círculo
- Cada clase mantiene su propia implementación de área y perímetro
- Todas las implementaciones son consistentes con la clase base

### 3. AreaCalculator
- Trabaja con la clase base Shape
- No necesita conocer las clases específicas
- Puede manejar cualquier forma que extienda de Shape

## Por qué esto Cumple con LSP

1. **Sustitución Sin Problemas**
   - Cualquier forma puede ser usada donde se espera un Shape
   - No hay comportamientos inesperados
   - No hay necesidad de verificar tipos

2. **Contrato Consistente**
   - Todas las formas implementan los mismos métodos
   - Los métodos tienen comportamientos predecibles
   - Los resultados son matemáticamente correctos

3. **No Hay Violaciones de LSP**
   - No hay métodos que lancen excepciones inesperadas
   - No hay verificaciones de tipo en tiempo de ejecución
   - No hay comportamientos especiales para tipos específicos

## Cómo Usar

1. Coloca los archivos en tu servidor web
2. Accede a index.php
3. Observa cómo diferentes formas pueden ser usadas de manera intercambiable

## Ejemplo de Uso

```php
// Crear formas
$rectangle = new Rectangle(4, 5);
$square = new Square(5);
$circle = new Circle(3);

// Usar el calculador
$calculator = new AreaCalculator();
$calculator->addShape($rectangle);
$calculator->addShape($square);
$calculator->addShape($circle);

// Calcular área total
echo $calculator->getTotalArea();
```

## Cómo Extender
Para agregar una nueva forma:
1. Crear una nueva clase que extienda de Shape
2. Implementar getArea() y getPerimeter()
3. La nueva forma funcionará automáticamente con AreaCalculator

## Beneficios
- Código más mantenible
- Fácil de extender
- Sin sorpresas en tiempo de ejecución
- Mejor diseño orientado a objetos