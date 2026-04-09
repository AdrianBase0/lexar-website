<?php
/**
 * politica-cookies.php - Gestión de cookies
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos
$cookies_info = $content['legal']['cookies'] ?? [];
$page_content = [
    'seo' => [
        'titulo' => 'Política de Cookies | Advance Lexar - Consultoría',
        'descripcion' => 'Información detallada sobre el uso de cookies en el sitio web.'
    ]
];
$current_page = 'politica-cookies.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <section class="page-header" style="padding: 4rem 0;">
        <div class="container text-center reveal">
            <span class="badge">Navegación</span>
            <h1>Política de Cookies</h1>
        </div>
    </section>

    <section class="about-summary" style="padding: 4rem 0;">
        <div class="container text-block-readable reveal">
            <h2>1. ¿Qué son las cookies?</h2>
            <p>Las cookies son pequeños ficheros de texto que se descargan en el equipo del Usuario al acceder a determinadas páginas web. Permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación para mejorar el rendimiento del sitio.</p>

            <h2 class="mt-lg">2. ¿Qué tipos de cookies utiliza esta página web?</h2>
            <ul class="styled-list">
                <li><strong>Cookies Técnicas Obligatorias:</strong> Son aquellas necesarias para la navegación y el buen funcionamiento de la página, por ejemplo para controlar el tráfico o implementar medidas de seguridad (Honeypot en validación de formularios).</li>
                <li><strong>Cookies de Análisis (Terceros):</strong> <?= $cookies_info['detalles_analisis'] ?? '(Dependiendo de la futura inyección de Google Analytics, [ESPECIFICAR AQUI]).' ?></li>
            </ul>

            <h2 class="mt-lg">3. Revocación y eliminación de cookies</h2>
            <p>Usted puede permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador (Google Chrome, Mozilla Firefox, Safari, etc.).</p>
        </div>
    </section>
</main>

<?php include 'components/footer.php'; ?>
