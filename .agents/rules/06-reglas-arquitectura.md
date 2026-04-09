---
trigger: always_on
---

# Reglas de Arquitectura y Estructura de Carpetas

## Principio General
La arquitectura del proyecto debe ser plana, predecible y modular. Al ser un proyecto "Vanilla" (HTML/CSS/JS puro) optimizado para rendimiento, la organización estricta de los archivos estáticos y del backend es crítica para su posterior despliegue en el espacio web de IONOS.

## Árbol de Directorios Obligatorio
El agente debe construir y respetar estrictamente la siguiente estructura:

```text
/ (Directorio Raíz)
├── index.html                # Página de inicio
├── servicios.html            # Áreas de práctica y consultoría
├── sobre-nosotros.html       # Filosofía y modelo de la firma
├── contacto.html             # Formulario y datos de contacto
├── aviso-legal.html          # Obligatorio RGPD / LSSI
├── politica-privacidad.html  # Obligatorio RGPD / LSSI
├── politica-cookies.html     # Obligatorio RGPD / LSSI
├── .gitignore                # Exclusiones de Git (node_modules, configuraciones locales)
├── README.md                 # Documentación del proyecto para el equipo
│
├── /assets/                  # Archivos estáticos
│   ├── /img/                 # Imágenes (logo-firma.png, fotos optimizadas)
│   ├── /icons/               # Iconos corporativos (preferiblemente formato SVG)
│   └── /fonts/               # Fuentes tipográficas locales (opcional)
│
├── /css/                     # Hojas de estilo
│   └── style.css             # CSS principal (con Custom Properties en :root)
│
├── /js/                      # Scripts
│   ├── main.js               # Lógica global (menú de navegación móvil, interacciones UI)
│   └── form-handler.js       # Validación de formulario y petición AJAX (fetch)
│
├── /backend/                 # Archivos de servidor
│   ├── procesar_formulario.php # Controlador API para el envío de emails
│   └── /PHPMailer/           # Dependencia para envío seguro mediante SMTP
│
└── /.agents/                 # Entorno de Google Antigravity / IDX
    └── /rules/               # Reglas de comportamiento (archivos .md)