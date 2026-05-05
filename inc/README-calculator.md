# Calculadora de Ahorros - Documentación

## 📋 Descripción

Página de calculadora interactiva que permite a los usuarios estimar los ahorros potenciales al implementar las soluciones de gestión de flotas de Comsatel.

## 📁 Archivos

- **Template**: `inc/template-calculator.php`
- **JavaScript**: `js/calculator.js`
- **Componente de botón**: `inc/componentes/button-arrow.php`

## 🚀 Cómo usar

### 1. Crear una página en WordPress

1. Ve a **Páginas > Añadir nueva** en el admin de WordPress
2. Dale un título (ej: "Calculadora de Ahorros")
3. En el panel derecho, en **Atributos de página**, selecciona la plantilla: **Calculadora de Ahorro**
4. Publica la página

### 2. Personalizar los cálculos

Los cálculos se pueden ajustar editando el archivo `js/calculator.js`:

```javascript
const CONFIG = {
    savingsPercentages: {
        fuel: 0.15,          // 15% de ahorro en combustible
        maintenance: 0.20,   // 20% de ahorro en mantenimiento
        tires: 0.18,         // 18% de ahorro en llantas
        productivity: 0.25   // 25% de ahorro en productividad
    },
    
    averageCosts: {
        fuelPricePerGallon: 15.50,      // Precio del galón en soles
        maintenancePerKm: 0.08,         // Costo de mantenimiento por km
        tiresPerKm: 0.05,               // Costo de llantas por km
        productivityPerVehicle: 200     // Costo de productividad por vehículo/mes
    }
};
```

## ✨ Características

### Formulario Interactivo
- ✅ 3 preguntas para calcular ahorros
- ✅ Validación de campos en tiempo real
- ✅ Actualización automática de resultados
- ✅ Soporte para KM/GL y KM/L

### Resultados Dinámicos
- ✅ Ahorro total mensual
- ✅ Porcentaje de ahorro
- ✅ Desglose por categorías:
  - Combustible
  - Mantenimiento
  - Llantas
  - Productividad
- ✅ Animaciones suaves de números

### Acciones
- ✅ Enviar reporte por correo
- ✅ Solicitar asesoría personalizada

### Diseño
- ✅ Responsive (móvil, tablet, desktop)
- ✅ Animaciones AOS
- ✅ Sticky sidebar en desktop
- ✅ Scroll automático en móvil
- ✅ Usa los estilos globales del tema

## 🎨 Personalización de estilos

La calculadora usa las clases de Tailwind CSS y los estilos globales definidos en `src/global.css`:

- Botones: `.btn`, `.btn-primary`, `.btn-outline`
- Colores: `text-primary`, `bg-primary`, etc.
- Espaciado: clases de Tailwind estándar

## 🔧 Funciones JavaScript

### Principales funciones:

- `calculateSavings()`: Calcula los ahorros basados en los inputs
- `updateResults()`: Actualiza la UI con los resultados
- `animateValue()`: Anima los números con efecto de conteo
- `handleEmailReport()`: Maneja el envío de reporte por email
- `handleRequestConsultation()`: Maneja la solicitud de asesoría

### Eventos:

- Submit del formulario
- Input en tiempo real (con debounce de 500ms)
- Click en botones de acción

## 📊 Fórmulas de cálculo

### Ahorro en Combustible
```
totalKm = vehículos × kmPorMes
galonesPorMes = totalKm ÷ kmPorGalón
costoMensual = galonesPorMes × precioPorGalón
ahorro = costoMensual × porcentajeAhorro (15%)
```

### Ahorro en Mantenimiento
```
ahorro = totalKm × costoPorKm × porcentajeAhorro (20%)
```

### Ahorro en Llantas
```
ahorro = totalKm × costoPorKm × porcentajeAhorro (18%)
```

### Ahorro en Productividad
```
ahorro = vehículos × costoPorVehículo × porcentajeAhorro (25%)
```

## 🔌 Integración con backend

Para implementar el envío de emails y solicitud de asesoría, necesitas crear endpoints en WordPress:

### Ejemplo de AJAX para enviar reporte:

```javascript
// En handleEmailReport()
fetch('/wp-admin/admin-ajax.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
        action: 'send_calculator_report',
        email: email,
        results: JSON.stringify(calculatorState.results),
        nonce: calculatorData.nonce
    })
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        alert('Reporte enviado exitosamente');
    }
});
```

### Agregar en functions.php:

```php
// AJAX handler para enviar reporte
add_action('wp_ajax_send_calculator_report', 'send_calculator_report');
add_action('wp_ajax_nopriv_send_calculator_report', 'send_calculator_report');

function send_calculator_report() {
    check_ajax_referer('calculator_nonce', 'nonce');
    
    $email = sanitize_email($_POST['email']);
    $results = json_decode(stripslashes($_POST['results']), true);
    
    // Enviar email con wp_mail()
    // ...
    
    wp_send_json_success();
}
```

## 🎯 Mejoras futuras

- [ ] Integración con CRM
- [ ] Guardar cálculos en base de datos
- [ ] Exportar resultados a PDF
- [ ] Comparación con competencia
- [ ] Gráficos interactivos
- [ ] Calculadora avanzada con más variables

## 📱 Compatibilidad

- ✅ Chrome, Firefox, Safari, Edge (últimas versiones)
- ✅ iOS Safari 12+
- ✅ Android Chrome 80+
- ✅ Responsive: 320px - 2560px

## 🐛 Troubleshooting

### El script no se carga
- Verifica que el archivo `js/calculator.js` existe
- Revisa la consola del navegador para errores
- Asegúrate de que la página usa la plantilla correcta

### Los cálculos no funcionan
- Abre la consola del navegador (F12)
- Verifica que no hay errores de JavaScript
- Revisa que los IDs de los elementos coincidan

### Los estilos no se aplican
- Verifica que Tailwind CSS está compilado
- Asegúrate de que `npm run watch:tailwind` está corriendo
- Limpia la caché del navegador

## 📞 Soporte

Para más información o soporte, contacta al equipo de desarrollo.
