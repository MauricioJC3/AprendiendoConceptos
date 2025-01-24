## ***Inyección de Dependencias:***

Imagina que vas a un restaurante. En lugar de que la cocina tenga que producir sus propios ingredientes, estos son "inyectados" desde proveedores externos. El restaurante depende de estos ingredientes, pero no se preocupa por cómo se producen - solo los utiliza. En programación, es similar: en lugar de que una clase cree sus propias dependencias, estas se le proporcionan desde fuera, lo que hace el código más flexible y fácil de modificar.

## ***Principios SOLID:***

### **S - Principio de Responsabilidad Única:**

Cada cosa debe hacer una sola cosa y hacerla bien. -> no puede tener dos responsabilidades cada cosa solo debe tener una

Ejemplo: En una casa, la lavadora solo lava ropa, el horno solo cocina, y el refrigerador solo mantiene los alimentos fríos. No esperarías que tu lavadora también cocinara la cena.

### **O - Principio de Abierto/Cerrado:**

Las cosas deben estar abiertas para extensión pero cerradas para modificación.  -> ósea si se hace una función o se hace algo, eso se debe poder aplicar en otras cosas y extenderse, pero esa función o eso que se hizo no se puede editar o cambiar.

Ejemplo: Un control remoto universal. Puedes añadir nuevos dispositivos para controlar (extensión) sin tener que modificar cómo funciona el control remoto existente.

### **L - Principio de Sustitución de Liskov: (se puede evitar)**

Si algo funciona con un tipo de objeto, debería funcionar igual con sus subtipos.

Ejemplo: Si tienes una receta que requiere fruta, deberías poder usar manzanas, peras o naranjas sin cambiar la receta básica. Todas son frutas y deberían funcionar en el contexto de la receta.

### **I - Principio de Segregación de Interfaces:**

Es mejor tener varias interfaces específicas que una grande general. -> una interfaz solo debe tener una responsabilidad se complementa con el primer principio

Ejemplo: En lugar de tener un "empleado hace todo" en una empresa, es mejor tener roles específicos: un contador para las finanzas, un vendedor para las ventas, etc. Cada uno se especializa en su área.

### **D - Principio de Inversión de Dependencias:**

Depende de abstracciones, no de implementaciones concretas.

Ejemplo: Cuando contratas a alguien, te importa que sepa hacer el trabajo (abstracción), no exactamente cómo lo hace (implementación). Mientras cumpla con sus responsabilidades, los detalles específicos no son relevantes.

## ***Abstracción:***

La abstracción es simplificar algo complejo enfocándose solo en los detalles importantes y ocultando la complejidad innecesaria.
Ejemplo de la vida real:

Cuando conduces un carro, solo necesitas saber:

- Cómo usar el volante
- Cómo usar los pedales
- Cómo cambiar velocidades

No necesitas saber exactamente cómo funciona el motor, cómo se procesa el combustible, o cómo funciona el sistema eléctrico. Esos detalles están "abstraídos" para ti. La abstracción te permite concentrarte en lo que necesitas saber para usar el carro efectivamente, sin preocuparte por los detalles técnicos complejos.