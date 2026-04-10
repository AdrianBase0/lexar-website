# Advance Lexar - Consultoría Estratégica Concursal

Este repositorio contiene el código fuente de la página web oficial para **Advance Lexar**, una firma de consultoría estratégica y gestión empresarial especializada en asesoramiento legal, económico e inmobiliario.

## 🚀 Descripción del Proyecto

El sitio web es una plataforma multipágina profesional diseñada para proyectar confianza, rigor y excelencia técnica. Implementa una arquitectura modular basada en PHP para la reutilización de componentes y una separación clara entre lógica, contenido y diseño.

## 🛠️ Stack Tecnológico

El proyecto se rige por una filosofía de **cero dependencias externas innecesarias** y máximo rendimiento (Lighthouse 100/100):

*   **Frontend**: HTML5 Semántico, CSS3 Nativo (Custom Properties, Grid, Flexbox) y JavaScript Vanilla (ES6+).
*   **Backend**: PHP 8+ para la gestión de plantillas dynamic injection y procesamiento de formularios.
*   **Correo**: Integración con **PHPMailer** para envíos seguros vía SMTP.
*   **Contenido**: Sistema de gestión de contenidos desacoplado mediante archivos **JSON**.

## 📂 Estructura del Proyecto

```text
/
├── assets/                  # Recursos estáticos
│   ├── img/                 # Fotos y gráficos optimizados (WebP)
│   ├── icons/               # Iconografía corporativa (SVG)
│   └── fonts/               # Tipografías locales
├── backend/                 # Lógica de servidor y API
│   ├── PHPMailer/           # Dependencia para envío de correos
│   ├── config.php           # Configuración (SMTP, etc.)
│   └── procesar_formulario.php # Handler del formulario de contacto
├── components/              # Fragmentos de código reutilizables (PHP)
│   ├── head.php             # Metadatos y carga de estilos
│   ├── header.php           # Navegación global
│   └── footer.php           # Pie de página y carga de scripts
├── css/                     # Hojas de estilo modulares
├── data/                    # Almacenamiento de textos y contenido
│   └── content.json         # Fuente única de verdad para los textos del sitio
├── js/                      # Scripts de cliente
│   ├── main.js              # Interactividad global (Scroll reveal, etc.)
│   └── form-handler.js      # Validación y envío AJAX del formulario
├── index.php                # Página de inicio
├── servicios.php            # Áreas de práctica
├── sobre-nosotros.php       # Filosofía y modelo de la firma
├── contacto.php             # Canal de comunicación
└── [legal].php              # Páginas legales obligatorias (Aviso, Privacidad, Cookies)
```

## ⚙️ Desarrollo y Entorno Local

Al incluir lógica en PHP, el proyecto requiere un servidor web local para funcionar correctamente:

1.  **Requisitos**: Disponer de un entorno como XAMPP, Laragon, LocalWP o Docker con soporte para PHP 8.0+.
2.  **Configuración**:
    *   Copia los archivos al directorio raíz de tu servidor (ej. `htdocs`).
    *   Configura las credenciales SMTP en `backend/config.php` para habilitar el formulario de contacto.
3.  **Ejecución**: Accede a la URL local (ej. `http://localhost/lexar-website/`).

## 📐 Reglas de Diseño e Identidad

*   **Tipografía**: Merriweather (Serif) para títulos y Open Sans para cuerpo de texto.
*   **Aesthetics**: Diseño limpio, espacios amplios y micro-animaciones sutiles.
*   **Accesibilidad**: Cumplimiento de WCAG 2.1 - Nivel AA.

---
© <?= date('Y') ?> Advance Lexar. Todos los derechos reservados.
