---
trigger: always_on
---

# Reglas de Accesibilidad (A11y) y Rendimiento Web

## 1. Accesibilidad Estándar (WCAG 2.1 - Nivel AA)
El agente debe garantizar que cualquier usuario, independientemente de sus capacidades o dispositivo, pueda navegar por la web.

- **Navegación por teclado:** Todos los elementos interactivos (enlaces, botones, campos de formulario) deben ser accesibles mediante la tecla `Tab`. 
- **Estados Focus:** Nunca eliminar el `outline` nativo del navegador a menos que se reemplace por un estilo personalizado altamente visible en la pseudo-clase `:focus` o `:focus-visible`.
- **Contraste de Color:** Mantener un ratio de contraste mínimo de 4.5:1 para textos normales y 3:1 para textos grandes, respetando la paleta corporativa de Advance Lexar.
- **Atributos ARIA:** - Usar `aria-label` en botones o enlaces que no tengan texto visible (ej. botones de redes sociales o menú hamburguesa).
  - Usar `aria-hidden="true"` en iconos decorativos (SVG, fuentes de iconos) para que los lectores de pantalla los ignoren.

## 2. Optimización de Medios e Imágenes
- **Texto Alternativo:** Uso estricto del atributo `alt` descriptivo en la etiqueta `<img>`. Si una imagen es puramente decorativa, usar `alt=""` para que los lectores de pantalla la omitan.
- **Formatos Modernos:** Priorizar el uso de formatos de nueva generación como `WebP` o `AVIF` en lugar de JPG/PNG tradicionales.
- **Dimensiones Explícitas:** Siempre definir los atributos `width` y `height` en el HTML de las imágenes para evitar el "Cumulative Layout Shift" (CLS) mientras carga la página.
- **Límite de Peso:** Ninguna imagen debe superar los 200 KB (idealmente por debajo de 100 KB para recursos de UI y logos).

## 3. Core Web Vitals y Carga
- **LCP (Largest Contentful Paint):** El elemento más grande visible "above the fold" (ej. la imagen principal de la cabecera) no debe tener `loading="lazy"`. Opcionalmente, precargarlo con `<link rel="preload">` en el `<head>`.
- **Recursos Bloqueantes:** El CSS crítico debe cargar lo más rápido posible. Los scripts JavaScript que no sean estrictamente necesarios para pintar la pantalla inicial deben llevar los atributos `defer` o `async`.