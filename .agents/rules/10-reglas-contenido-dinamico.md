---
trigger: always_on
---

# Reglas de Contenido Dinámico y Plantillas (Arquitectura PHP + JSON)

## 1. Desacoplamiento de Contenido
- Queda estrictamente prohibido introducir los textos definitivos de la web directamente en el código de las vistas.
- Todo el contenido textual (títulos, descripciones, ítems de servicios, avisos legales, datos de contacto) debe almacenarse centralizado en un archivo estructurado: `/data/content.json`.

## 2. Archivos de Vista (PHP)
- Todas las páginas públicas de la web dejarán de ser `.html` y usarán la extensión `.php` (ej. `index.php`, `servicios.php`, `contacto.php`).
- El agente debe programar un mecanismo eficiente al inicio de cada vista (o mediante un `header.php` global incluido) que lea y decodifique el JSON:
  `$json_file = file_get_contents(__DIR__ . '/data/content.json');`
  `$content = json_decode($json_file, true);`
- La inyección del contenido en el marcado se hará exclusivamente mediante etiquetas de impresión de PHP: `<?= $content['pagina']['seccion']['clave'] ?? '' ?>`.

## 3. Rendimiento y Modularidad
- El uso de PHP en las vistas está restringido **únicamente** a la inyección de textos (Server-Side Rendering simple) y a la inclusión de componentes repetitivos (ej. `include 'components/nav.php';` o `include 'components/footer.php';`).
- No se debe añadir lógica de negocio compleja ni llamadas a bases de datos en estos archivos. El objetivo sigue siendo generar un HTML final lo más rápido posible para lograr un score de 100/100 en Lighthouse.