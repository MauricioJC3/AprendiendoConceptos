# Proyecto PHP - Principio Abierto/Cerrado (OCP)

Este proyecto demuestra la implementación del segundo principio SOLID: el Principio de Abierto/Cerrado (Open/Closed Principle).

## Estructura del Proyecto

```
proyecto-ocp/
├── Models/
│   └── Products.php
├── Interfaces/
│   └── DiscountStrategy.php
├── Discounts/
│   ├── RegularDiscount.php
│   ├── PremiumDiscount.php
│   └── SeasonalDiscount.php
├── Services/
│   └── PriceCalculator.php
└── index.php
```

## Explicación del Principio Abierto/Cerrado

El OCP establece que las entidades de software deben estar:
- Abiertas para extensión
- Cerradas para modificación

En este proyecto, esto se logra mediante:
1. Una interfaz de estrategia de descuento
2. Diferentes implementaciones de descuento
3. Un calculador que acepta cualquier estrategia de descuento

## Cómo Funciona

1. La clase `Product` mantiene la información básica del producto
2. La interfaz `DiscountStrategy` define el contrato para calcular descuentos
3. Diferentes clases de descuento implementan la interfaz
4. `PriceCalculator` usa cualquier estrategia de descuento sin necesidad de modificación

## Beneficios

1. **Extensibilidad**: 
   - Nuevos tipos de descuento pueden agregarse sin modificar el código existente
   - Solo necesitas crear una nueva clase que implemente `DiscountStrategy`

2. **Mantenibilidad**:
   - Cada estrategia de descuento está encapsulada en su propia clase
   - Los cambios en una estrategia no afectan a las demás

## Instalación

1. Coloca los archivos en tu servidor web
2. Accede a `index.php`

## Ejemplo de Extensión

Para agregar un nuevo tipo de descuento:

```php
class NewDiscount implements DiscountStrategy {
    public function calculateDiscount(Product $product): float {
        // Nueva lógica de descuento aquí
        return $product->getPrice() * 0.25;
    }
}
```

No se necesita modificar ninguna otra parte del código existente.