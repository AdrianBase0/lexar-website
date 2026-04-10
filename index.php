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
        <div class="hero-image-wrapper">
            <img src="assets/img/hero-principal.webp" alt="Imagen corporativa de Advance Lexar - Consultoría Estratégica" width="1200" height="600" class="hero-image">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-arrow-top)"><path d="M12 7l3 7-3 7-3-7z"></path><path d="M12 3v4"></path><path d="M12 21v2"></path><path d="M4 11h2"></path><path d="M18 11h2"></path></svg>
                    </div>
                    <h3>Consultoría Legal</h3>
                    <p><?= $content['pages']['servicios']['items']['legal']['parrafo_1'] ?? '[TEXTO CORTO SERVICIO 1]' ?></p>
                    <a href="servicios.php#legal" class="card-link">Saber más &rarr;</a>
                </article>

                <!-- Tarjeta 2: Estrategia y Economía -->
                <article class="service-card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-arrow-top)"><path d="M3 3v18h18"></path><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"></path></svg>
                    </div>
                    <h3>Estrategia y Economía</h3>
                    <p><?= $content['pages']['servicios']['items']['estrategica']['parrafo_1'] ?? '[TEXTO CORTO SERVICIO 2]' ?></p>
                    <a href="servicios.php#estrategica" class="card-link">Saber más &rarr;</a>
                </article>

                <!-- Tarjeta 3: Gestión Inmobiliaria -->
                <article class="service-card">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--color-arrow-top)"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
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
                <img src="assets/img/foto-firma.webp" alt="Sede corporativa de Advance Lexar - Profesionalidad y Rigor" width="600" height="800" loading="lazy">
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
    $cta_title = $page_content['cta_final']['titulo'] ?? 'Asegure Hoy el Futuro de su Organización';
    $cta_subtitle = $page_content['cta_final']['subtitulo'] ?? 'Contacte con nuestros consultores y descubra cómo podemos aportar valor estratégico a su empresa.';
    include 'components/cta_banner.php'; 
    ?>
</main>

<?php include 'components/footer.php'; ?>
