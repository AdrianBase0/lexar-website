<?php
/**
 * servicios.php - Detalle de áreas de práctica
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos de esta página
$page_content = $content['pages']['servicios'] ?? [];
$current_page = 'servicios.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <!-- CABECERA DE LA PÁGINA -->
    <section class="page-header">
        <div class="container text-center reveal">
            <span class="badge"><?= $page_content['cabecera']['badge'] ?? 'Áreas de Práctica' ?></span>
            <h1><?= $page_content['cabecera']['titulo'] ?? 'Catálogo de Servicios' ?></h1>
            <p class="page-header-subtitle"><?= $page_content['cabecera']['subtitulo'] ?? '[SUBTITULO DESCRIPTIVO DE SERVICIOS AQUI]' ?></p>
        </div>
    </section>

    <!-- DETALLE: LEGAL -->
    <section id="legal" class="service-detail">
        <div class="container grid-2-columns">
            <div class="service-text reveal-left">
                <div class="service-icon-wrapper">
                    <img src="https://via.placeholder.com/48x48/f9f8f6/7d4334?text=Ico" alt="" width="48" height="48" aria-hidden="true">
                </div>
                <h2><?= $page_content['items']['legal']['titulo'] ?? 'Consultoría Legal' ?></h2>
                <p><?= $page_content['items']['legal']['parrafo_1'] ?? '[TEXTO EXTENSO SERVICIO LEGAL PARRAFO 1 AQUI...]' ?></p>
                <p><?= $page_content['items']['legal']['parrafo_2'] ?? '[TEXTO EXTENSO SERVICIO LEGAL PARRAFO 2 AQUI...]' ?></p>
                
                <ul class="styled-list">
                    <?php if (isset($page_content['items']['legal']['bullets'])): ?>
                        <?php foreach($page_content['items']['legal']['bullets'] as $bullet): ?>
                            <li><?= $bullet ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="service-image hover-zoom">
                <img src="https://via.placeholder.com/600x500/3b2c24/e5ce83?text=[IMAGEN LEGAL 600x500]" alt="[DESCRIPCION ACCESIBILIDAD IMAGEN LEGAL]" width="600" height="500" loading="lazy">
            </div>
        </div>
    </section>

    <!-- DETALLE: ECONÓMICA Y ESTRATÉGICA (Fondo alternativo y layout invertido) -->
    <section id="estrategica" class="service-detail bg-alt">
        <div class="container grid-2-columns reverse-desktop">
            <div class="service-image hover-zoom reveal-left">
                <img src="https://via.placeholder.com/600x500/d28b46/ffffff?text=[IMAGEN ECONOMICA 600x500]" alt="[DESCRIPCION ACCESIBILIDAD IMAGEN ECONOMICA]" width="600" height="500" loading="lazy">
            </div>
            <div class="service-text">
                <div class="service-icon-wrapper">
                    <img src="https://via.placeholder.com/48x48/f9f8f6/7d4334?text=Ico" alt="" width="48" height="48" aria-hidden="true">
                </div>
                <h2><?= $page_content['items']['estrategica']['titulo'] ?? 'Consultoría Estratégica' ?></h2>
                <p><?= $page_content['items']['estrategica']['parrafo_1'] ?? '[TEXTO EXTENSO SERVICIO ECONOMICO PARRAFO 1 AQUI...]' ?></p>
                <p><?= $page_content['items']['estrategica']['parrafo_2'] ?? '[TEXTO EXTENSO SERVICIO ECONOMICO PARRAFO 2 AQUI...]' ?></p>
                
                <ul class="styled-list">
                    <?php if (isset($page_content['items']['estrategica']['bullets'])): ?>
                        <?php foreach($page_content['items']['estrategica']['bullets'] as $bullet): ?>
                            <li><?= $bullet ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- DETALLE: INMOBILIARIA -->
    <section id="inmobiliaria" class="service-detail">
        <div class="container grid-2-columns">
            <div class="service-text reveal-left">
                <div class="service-icon-wrapper">
                    <img src="https://via.placeholder.com/48x48/f9f8f6/7d4334?text=Ico" alt="" width="48" height="48" aria-hidden="true">
                </div>
                <h2><?= $page_content['items']['inmobiliaria']['titulo'] ?? 'Gestión Inmobiliaria' ?></h2>
                <p><?= $page_content['items']['inmobiliaria']['parrafo_1'] ?? '[TEXTO EXTENSO SERVICIO INMOBILIARIA PARRAFO 1 AQUI...]' ?></p>
                <p><?= $page_content['items']['inmobiliaria']['parrafo_2'] ?? '[TEXTO EXTENSO SERVICIO INMOBILIARIA PARRAFO 2 AQUI...]' ?></p>
                
                <ul class="styled-list">
                    <?php if (isset($page_content['items']['inmobiliaria']['bullets'])): ?>
                        <?php foreach($page_content['items']['inmobiliaria']['bullets'] as $bullet): ?>
                            <li><?= $bullet ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="service-image hover-zoom">
                <img src="https://via.placeholder.com/600x500/d28b46/ffffff?text=[IMAGEN INMOBILIARIA 600x500]" alt="[DESCRIPCION ACCESIBILIDAD IMAGEN INMOBILIARIA]" width="600" height="500" loading="lazy">
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <?php 
    $cta_title = "¿Necesita impulsar el crecimiento de su empresa?";
    $cta_subtitle = "Nuestros expertos están a su disposición para diseñar la estrategia óptima.";
    include 'components/cta_banner.php'; 
    ?>
</main>

<?php include 'components/footer.php'; ?>
