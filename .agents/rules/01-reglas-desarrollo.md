---
trigger: always_on
---

# Reglas de Desarrollo: Advance Lexar

## Stack Tecnológico
- **HTML**: HTML5 semántico puro.
- **CSS**: CSS3 nativo. Uso obligatorio de CSS Variables (Custom Properties) para temas. Uso de Flexbox y CSS Grid para layouts.
- **JavaScript**: Vanilla JS (ES6+). 
- **Prohibiciones estrictas**: NO usar frameworks ni librerías externas (ni Bootstrap, ni Tailwind, ni React, ni jQuery). Cero dependencias innecesarias.

## Rendimiento y Optimización
- El objetivo es un score de 100/100 en Google Lighthouse.
- Todo el CSS crítico debe cargarse de manera eficiente.
- Minificar archivos en el paso a producción.
- Carga diferida (lazy loading) para imágenes nativa (`loading="lazy"`).

## Arquitectura de Archivos
- Mantener una estructura modular: `/css/style.css`, `/js/main.js`, `/assets/img/`.
- Comentar el código de forma concisa y clara.