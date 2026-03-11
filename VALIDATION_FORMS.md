Contexto

Estoy desarrollando un cotizador multi-step (modal) para una solución de monitoreo vehicular.

El flujo incluye:

Paso 1

Tipo de cliente: Persona Natural / Empresa (selector tipo card).

Nro de documento (RUC / DNI dinámico).

Nombre Completo.

Nro Teléfono (obligatorio, debe empezar con 9 y tener exactamente 9 dígitos).

Correo Electrónico.

Reglas de validación esperadas:

DNI → exactamente 8 dígitos.

RUC → exactamente 11 dígitos.

Teléfono → debe cumplir regex ^9\d{8}$

Empieza con 9

Exactamente 9 números

No permitir letras ni caracteres especiales

Email → formato válido estándar.

No permitir avanzar al Paso 2 si existen campos inválidos.

Validación visual inmediata (on blur + on change).

Botón "Siguiente" deshabilitado hasta validación completa.

Paso 2

País y Provincia (dropdowns dependientes).

Selección de productos por categorías:

Monitoreo GPS

Eficiencia y control

Video y seguridad

Subproductos seleccionables (checkbox).

Chips seleccionados como tags removibles.

Cantidad de vehículos (rangos: 1-10, 11-20, 12-50, +100).

Necesito que audites lo siguiente:
1. Validación de Datos

¿Es coherente permitir RUC cuando el tipo de cliente es Persona Natural?

¿Debe cambiar dinámicamente entre DNI (8) y RUC (11)?

¿La validación es estricta y consistente?

¿El teléfono está correctamente validado bajo estándar peruano (9 dígitos iniciando en 9)?

¿Se permite avanzar con campos incompletos?

¿La validación es solo visual o también lógica?

¿Existe validación cross-field?

2. Lógica de Negocio

¿Hay inconsistencias entre tipo de cliente y documento?

¿Puede generarse estado inválido entre categoría → subproducto → chip?

¿Puede existir un chip sin checkbox activo?

¿Hay riesgo de duplicidad?

¿El rango "12-50" es un error vs 21-50?

¿Se puede enviar el formulario sin productos seleccionados?

3. UX y Consistencia Visual

¿Los estados activo/inactivo están bien definidos?

¿Los bordes rojos indican error o selección? ¿Hay ambigüedad?

¿El usuario entiende qué ha seleccionado?

¿La jerarquía visual guía correctamente?

¿El botón "Siguiente" debería bloquearse hasta validación 100% correcta?

4. Estados Edge Case

Cambio de tipo de cliente luego de ingresar documento.

Cambio de país luego de elegir provincia.

Deselección de categoría con subproductos activos.

Cierre y reapertura del modal.

Selección de 0 productos.

Estado inconsistente entre UI y estado interno.

5. Arquitectura Frontend

¿Conviene usar máquina de estados (XState o similar)?

¿Separar estado visual del estado lógico?

¿Cómo garantizar sincronización entre:

categorías

subproductos

chips renderizados?

¿Es este flujo vulnerable a race conditions o estados zombie?

¿Cómo hacerlo production-ready?

6. Experiencia de Conversión B2B

¿El flujo tiene fricción innecesaria?

¿Hay demasiadas decisiones en el Paso 2?

¿Puede simplificarse sin perder información crítica?

¿La estructura favorece intención de compra empresarial?

Objetivo

Detectar:

Errores lógicos.

Inconsistencias de negocio.

Problemas reales de UX.

Riesgos técnicos en manejo de estado.

Oportunidades estructurales de mejora.

No necesito sugerencias superficiales.

Necesito auditoría crítica de producto + frontend con mentalidad production-ready.

Evalúa como:

UX Senior

QA funcional

Arquitecto frontend

Analista de conversión B2B