# Single Post del Blog - Comsatel

## Descripción
Plantilla personalizada para posts individuales del blog con diseño moderno usando **Tailwind CSS**.

## Características Implementadas

### ✅ Single Post (`single.php`)
- **Breadcrumbs** - Navegación jerárquica (Inicio > Blog > Post)
- **Hero Section** - Título grande y destacado
- **Meta Información**:
  - Autor (Equipo Comsatel)
  - Fecha de publicación
  - Tiempo de lectura estimado
- **Imagen Destacada** - Full width con bordes redondeados
- **Contenido del Post** - Estilos tipográficos optimizados
- **Tags** - Etiquetas interactivas con hover
- **CTA Section** - Llamado a la acción con gradiente
- **Posts Relacionados** - Slider de productos/posts de interés

### ✅ Slider de Productos de Interés (`section-productos-interes.php`)
- **Swiper Slider** - Carrusel responsive
- **Posts Relacionados** - Por categoría o recientes
- **Tarjetas Interactivas**:
  - Imagen con zoom al hover
  - Badge de categoría
  - Meta información (tiempo de lectura y fecha)
  - Extracto del post
  - Botón "Leer Más" animado
- **Navegación** - Botones prev/next con efectos hover
- **Responsive**:
  - Móvil: 1 slide
  - Tablet: 2 slides
  - Desktop: 3 slides

## Archivos Creados/Modificados

```
comsatel/
├── single.php (modificado - 100% Tailwind)
├── inc/
│   └── componentes/
│       └── section-productos-interes.php (nuevo)
└── src/
    └── global.css (modificado - estilos de contenido agregados)
```

## Estilos del Contenido

Se agregaron estilos para `.blog-content` en `global.css`:

### Elementos Estilizados:
- **Headings** (h2, h3) - Tamaños y espaciados optimizados
- **Párrafos** - Line-height 1.8 para mejor lectura
- **Listas** (ul, ol) - Con bullets/números y espaciado
- **Enlaces** - Color primary con underline
- **Imágenes** - Bordes redondeados y márgenes
- **Blockquotes** - Borde izquierdo rojo y estilo itálico
- **Strong** - Peso bold y color oscuro

### Utilidades Agregadas:
- `.line-clamp-2` - Limita texto a 2 líneas
- `.line-clamp-3` - Limita texto a 3 líneas

## Funcionalidades del Slider

### Lógica de Posts Relacionados:
1. **Primera opción**: Posts de la misma categoría
2. **Fallback**: Posts recientes si no hay relacionados
3. **Excluye**: El post actual
4. **Cantidad**: Hasta 6 posts
5. **Orden**: Aleatorio para relacionados, por fecha para recientes

### Configuración de Swiper:
```javascript
{
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        nextEl: '.productos-interes-next',
        prevEl: '.productos-interes-prev',
    },
    breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 20 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
    },
}
```

## Clases de Tailwind Utilizadas

### Layout
- `container mx-auto px-4` - Contenedor centrado
- `max-w-4xl mx-auto` - Ancho máximo para contenido
- `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3` - Grid responsive

### Tipografía
- `text-3xl md:text-4xl lg:text-5xl` - Títulos responsive
- `font-bold`, `font-semibold` - Pesos de fuente
- `leading-tight`, `leading-relaxed` - Line heights

### Colores
- `text-primary` - Rojo corporativo
- `text-dark` - Texto oscuro
- `text-gray-600` - Texto secundario
- `bg-gradient-to-r from-primary to-red-600` - Gradiente

### Efectos
- `hover:shadow-xl` - Sombra al hover
- `hover:text-primary` - Color al hover
- `transition-all duration-300` - Transiciones suaves
- `group-hover:scale-110` - Zoom en grupo

### Espaciado
- `py-8 md:py-12` - Padding vertical responsive
- `gap-4 md:gap-6` - Espacios entre elementos
- `mb-8 md:mb-12` - Márgenes responsive

## Personalización

### Cambiar el CTA
En `single.php` líneas 97-103, edita:
- Título del CTA
- Descripción
- URL del botón
- Texto del botón

### Cambiar Número de Posts Relacionados
En `section-productos-interes.php` línea 28:
```php
'posts_per_page' => 6, // Cambiar este número
```

### Modificar Breakpoints del Slider
En `section-productos-interes.php` líneas 185-192:
```javascript
breakpoints: {
    640: { slidesPerView: 2 },  // Tablet
    1024: { slidesPerView: 3 }, // Desktop
}
```

## Dependencias

- ✅ **Swiper.js** - Ya incluido en el tema
- ✅ **Tailwind CSS** - Compilado con `npm run watch:tailwind`
- ✅ **Función `comsatel_reading_time()`** - Definida en `inc/ajax-blog.php`

## Compatibilidad

- ✅ WordPress 5.0+
- ✅ PHP 7.4+
- ✅ Responsive (móvil, tablet, desktop)
- ✅ Navegadores modernos
- ✅ Compatible con Gutenberg y Classic Editor

## Notas

- Los errores de lint son normales - son funciones de WordPress
- El slider se inicializa automáticamente con Swiper
- Los estilos de contenido funcionan con cualquier editor
- Las imágenes se optimizan automáticamente con lazy loading
