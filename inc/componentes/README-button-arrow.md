# Componente: Botón con Flecha Animada

## Descripción
Componente reutilizable para mostrar un botón con animación de subrayado y flecha que se desplaza al hacer hover.

## Ubicación
`inc/componentes/button-arrow.php`

## Uso Básico

### Ejemplo 1: Uso simple con texto personalizado
```php
<?php
get_template_part('inc/componentes/button-arrow', null, array(
    'text' => 'LEER CASO COMPLETO',
    'url'  => get_permalink()
));
?>
```

### Ejemplo 2: Botón con todas las opciones
```php
<?php
get_template_part('inc/componentes/button-arrow', null, array(
    'text'       => 'VER MÁS INFORMACIÓN',
    'url'        => 'https://ejemplo.com',
    'class'      => 'mi-clase-personalizada',
    'target'     => '_blank',
    'rel'        => 'nofollow',
    'show_arrow' => true
));
?>
```

### Ejemplo 3: Botón sin flecha
```php
<?php
get_template_part('inc/componentes/button-arrow', null, array(
    'text'       => 'CONTACTAR',
    'url'        => '/contacto',
    'show_arrow' => false
));
?>
```

### Ejemplo 4: Botón con clases adicionales
```php
<?php
get_template_part('inc/componentes/button-arrow', null, array(
    'text'  => 'DESCARGAR PDF',
    'url'   => '/archivo.pdf',
    'class' => 'text-lg md:text-xl'
));
?>
```

## Parámetros

| Parámetro    | Tipo    | Default      | Descripción                                    |
|-------------|---------|--------------|------------------------------------------------|
| `text`      | string  | 'LEER MÁS'   | Texto que se mostrará en el botón              |
| `url`       | string  | '#'          | URL a la que apunta el enlace                  |
| `class`     | string  | ''           | Clases CSS adicionales para el botón           |
| `target`    | string  | '_self'      | Target del enlace (_blank, _self, etc)         |
| `rel`       | string  | ''           | Atributo rel del enlace                        |
| `show_arrow`| boolean | true         | Mostrar o ocultar la flecha                    |

## Características

✅ **Animación de subrayado**: El texto tiene una línea que se expande al hacer hover  
✅ **Flecha animada**: La flecha se desplaza hacia la derecha al hacer hover  
✅ **Totalmente personalizable**: Puedes cambiar texto, URL, clases y más  
✅ **Seguridad**: URLs sanitizadas y rel="noopener noreferrer" automático para enlaces externos  
✅ **Accesibilidad**: Estructura semántica correcta  

## Estilos Requeridos

Este componente usa las siguientes clases de Tailwind CSS que ya están en tu proyecto:
- `group`, `relative`, `inline-flex`, `items-center`
- `text-primary`, `font-semibold`, `hover:text-primary`
- `transition-colors`, `transition-transform`, `transition-all`
- `duration-300`
- `w-5`, `h-5`, `ml-2`
- `absolute`, `left-0`, `bottom-0`, `h-0.5`, `w-0`
- `bg-primary`, `group-hover:w-full`, `group-hover:translate-x-1`

## Notas

- El componente usa `wp_parse_args()` para combinar los argumentos con los valores por defecto
- Todos los valores son sanitizados automáticamente para seguridad
- Si usas `target="_blank"` sin especificar `rel`, se añade automáticamente `rel="noopener noreferrer"` por seguridad
