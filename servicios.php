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
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-arrow-top)"><path d="M12 7l3 7-3 7-3-7z"></path><path d="M12 3v4"></path><path d="M12 21v2"></path><path d="M4 11h2"></path><path d="M18 11h2"></path></svg>
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
                <img src="assets/img/servicio-legal.webp" alt="Consultoría legal corporativa y estructuración técnica en Madrid" width="600" height="500" loading="lazy">
            </div>
        </div>
    </section>

    <!-- DETALLE: ECONÓMICA Y ESTRATÉGICA (Fondo alternativo y layout invertido) -->
    <section id="estrategica" class="service-detail bg-alt">
        <div class="container grid-2-columns reverse-desktop">
            <div class="service-image hover-zoom reveal-left">
                <img src="assets/img/servicio-economico.webp" alt="Asesoramiento estratégico y económico para gestión empresarial" width="600" height="500" loading="lazy">
            </div>
            <div class="service-text">
                <div class="service-icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-arrow-top)"><path d="M3 3v18h18"></path><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"></path></svg>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-arrow-top)"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
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
                <img src="assets/img/servicio-inmobiliaria.webp" alt="Gestión de carteras inmobiliarias y administración de activos" width="600" height="500" loading="lazy">
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <?php 
    $cta_title = $page_content['cta_final']['titulo'] ?? "¿Necesita impulsar el crecimiento de su empresa?";
    $cta_subtitle = $page_content['cta_final']['subtitulo'] ?? "Nuestros expertos están a su disposición para diseñar la estrategia óptima.";
    include 'components/cta_banner.php'; 
    ?>
</main>

<?php include 'components/footer.php'; ?>
