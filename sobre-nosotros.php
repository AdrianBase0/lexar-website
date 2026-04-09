<?php
/**
 * sobre-nosotros.php - Filosofía y excelencia corporativa
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos de esta página
$page_content = $content['pages']['sobre_nosotros'] ?? [];
$current_page = 'sobre-nosotros.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <!-- CABECERA -->
    <section class="page-header">
        <div class="container text-center reveal">
            <span class="badge"><?= $page_content['cabecera']['badge'] ?? 'Nuestra Firma' ?></span>
            <h1><?= $page_content['cabecera']['titulo'] ?? 'Filosofía y Excelencia' ?></h1>
            <p class="page-header-subtitle"><?= $page_content['cabecera']['subtitulo'] ?? '[SUBTITULO CABECERA FILOSOFIA AQUI]' ?></p>
        </div>
    </section>

    <!-- EDITORIAL: HISTORIA Y VALORES -->
    <section class="about-summary">
        <div class="container">
            <div class="text-block-readable reveal">
                <h2 class="text-center mb-lg"><?= $page_content['historia']['titulo'] ?? '[TITULO PRINCIPAL QUÍENES SOMOS AQUI]' ?></h2>
                <p class="dropcap"><?= $page_content['historia']['parrafo_1'] ?? '[TEXTO EXTENSO HISTORIA Y FUNDACION PARRAFO 1 AQUI...]' ?></p>
                <p><?= $page_content['historia']['parrafo_2'] ?? '[TEXTO EXTENSO HISTORIA Y FUNDACION PARRAFO 2 AQUI...]' ?></p>
                <p><?= $page_content['historia']['parrafo_3'] ?? '[TEXTO EXTENSO HISTORIA Y FUNDACION PARRAFO 3 AQUI...]' ?></p>
            </div>
        </div>
    </section>

    <!-- BANNER DE IMAGEN CORPORATIVA -->
    <section class="pb-xxl">
        <div class="container">
            <div class="service-image hover-zoom">
                <img src="https://via.placeholder.com/1200x500/3b2c24/e5ce83?text=[IMAGEN DE EQUIPO O INSTALACIONES 1200x500]" alt="[DESCRIPCION IMAGEN ACCESIBILIDAD PARA EL LECTOR DE PANTALLAS]" width="1200" height="500" loading="lazy">
            </div>
        </div>
    </section>

    <!-- ESTRUCTURA TÉCNICA Y LEY 2/2007 -->
    <section class="services-overview bg-alt">
        <div class="container">
            <div class="section-header">
                <h2><?= $page_content['modelo']['titulo'] ?? 'Modelo de Coordinación Profesional' ?></h2>
            </div>
            <div class="grid-2-columns">
                <div class="service-text reveal-left">
                    <h3><?= $page_content['modelo']['subtitulo'] ?? '[SUBTITULO MODELO LEGAL Y OPERATIVO]' ?></h3>
                    <p><?= $page_content['modelo']['parrafo_1'] ?? '[TEXTO EXPLICATIVO COORDINACION Y LEY DE SOCIEDADES PROFESIONALES PARRAFO 1 AQUI...]' ?></p>
                    <p><?= $page_content['modelo']['parrafo_2'] ?? '[TEXTO EXPLICATIVO ACCION INTERDISCIPLINAR PARRAFO 2 AQUI...]' ?></p>
                </div>
                <div class="service-text border-left-accent reveal-right">
                    <h3>Nuestros Compromisos</h3>
                    <ul class="styled-list">
                        <?php if (isset($page_content['modelo']['compromisos'])): ?>
                            <?php foreach($page_content['modelo']['compromisos'] as $comp): ?>
                                <li><?= $comp ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <?php 
    $cta_title = "Cimentando el futuro de su empresa";
    $cta_subtitle = "Nuestra máxima es la confidencialidad absoluta, el rigor académico y la orientación a resultados tangibles.";
    include 'components/cta_banner.php'; 
    ?>
</main>

<?php include 'components/footer.php'; ?>
