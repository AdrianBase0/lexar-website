<?php
/**
 * index.php - Página de inicio de Advance Lexar
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos de esta página
$page_content = $content['pages']['index'] ?? [];
$current_page = 'index.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <!-- SECCIÓN HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1><?= $page_content['hero']['titulo'] ?? '[TITULO HERO PRINCIPAL AQUI]' ?></h1>
            <p class="hero-subtitle"><?= $page_content['hero']['subtitulo'] ?? '[SUBTITULO/VALOR DIFERENCIAL AQUI]' ?></p>
            <div class="hero-actions">
                <a href="contacto.php" class="btn btn-primary"><?= $page_content['hero']['cta_principal'] ?? 'Solicitar asesoramiento' ?></a>
                <a href="servicios.php" class="btn btn-secondary"><?= $page_content['hero']['cta_secundario'] ?? 'Ver servicios' ?></a>
            </div>
        </div>
    </section>

    <!-- SECCIÓN ÁREAS DE PRÁCTICA -->
    <section class="services-overview">
        <div class="container">
            <header class="section-header reveal">
                <h2><?= $page_content['secciones']['servicios_intro']['titulo'] ?? 'Áreas de Práctica' ?></h2>
                <p><?= $page_content['secciones']['servicios_intro']['descripcion'] ?? '[TEXTO INTRODUCCION SERVICIOS AQUI]' ?></p>
            </header>
            <div class="services-grid stagger-children">
                
                <!-- Tarjeta 1: Consultoría Legal -->
                <article class="service-card">
                    <div class="card-icon">
                        <img src="https://via.placeholder.com/48x48/f9f8f6/7d4334?text=Ico" alt="" width="48" height="48" aria-hidden="true">
                    </div>
                    <h3>Consultoría Legal</h3>
                    <p><?= $content['pages']['servicios']['items']['legal']['parrafo_1'] ?? '[TEXTO CORTO SERVICIO 1]' ?></p>
                    <a href="servicios.php#legal" class="card-link">Saber más &rarr;</a>
                </article>

                <!-- Tarjeta 2: Estrategia y Economía -->
                <article class="service-card">
                    <div class="card-icon">
                        <img src="https://via.placeholder.com/48x48/f9f8f6/7d4334?text=Ico" alt="" width="48" height="48" aria-hidden="true">
                    </div>
                    <h3>Estrategia y Economía</h3>
                    <p><?= $content['pages']['servicios']['items']['estrategica']['parrafo_1'] ?? '[TEXTO CORTO SERVICIO 2]' ?></p>
                    <a href="servicios.php#estrategica" class="card-link">Saber más &rarr;</a>
                </article>

                <!-- Tarjeta 3: Gestión Inmobiliaria -->
                <article class="service-card">
                    <div class="card-icon">
                        <img src="https://via.placeholder.com/48x48/f9f8f6/7d4334?text=Ico" alt="" width="48" height="48" aria-hidden="true">
                    </div>
                    <h3>Gestión Inmobiliaria</h3>
                    <p><?= $content['pages']['servicios']['items']['inmobiliaria']['parrafo_1'] ?? '[TEXTO CORTO SERVICIO 3]' ?></p>
                    <a href="servicios.php#inmobiliaria" class="card-link">Saber más &rarr;</a>
                </article>

            </div>
        </div>
    </section>

    <!-- SECCIÓN SOBRE NOSOTROS (RESUMEN) -->
    <section class="about-summary">
        <div class="container grid-2-columns">
            <div class="about-image reveal-left">
                <img src="https://via.placeholder.com/600x800/d28b46/ffffff?text=[IMAGEN_SOBRE_NOSOTROS_600x800]" alt="[DESCRIPCION_IMAGEN_FILOSOFIA]" width="600" height="800" loading="lazy">
            </div>
            <div class="about-text reveal-right">
                <span class="badge"><?= $page_content['secciones']['nosotros_resumen']['badge'] ?? 'Nuestra Firma' ?></span>
                <h2><?= $page_content['secciones']['nosotros_resumen']['titulo'] ?? '[TITULO SECCION NOSOTROS AQUI]' ?></h2>
                <p><?= $page_content['secciones']['nosotros_resumen']['parrafo_1'] ?? '[TEXTO LARGO FILOSOFIA Y RIGOR CORPORATIVO AQUI PARRAFO 1]' ?></p>
                <p><?= $page_content['secciones']['nosotros_resumen']['parrafo_2'] ?? '[TEXTO LARGO FILOSOFIA Y RIGOR CORPORATIVO AQUI PARRAFO 2]' ?></p>
                <div class="mt-lg">
                    <a href="sobre-nosotros.php" class="btn btn-secondary">Leer nuestra historia</a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN CTA FINAL -->
    <?php 
    $cta_title = "[TITULO LLAMADA ACCION FINAL]";
    $cta_subtitle = "[SUBTITULO LLAMADA ACCION FINAL]";
    include 'components/cta_banner.php'; 
    ?>
</main>

<?php include 'components/footer.php'; ?>
