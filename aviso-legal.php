<?php
/**
 * aviso-legal.php - Textos legales y datos identificativos
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos
$legal_info = $content['legal']['aviso_legal'] ?? [];
$page_content = $content['pages']['aviso_legal'] ?? [];
$current_page = 'aviso-legal.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <section class="page-header" style="padding: 4rem 0;">
        <div class="container text-center reveal">
            <span class="badge"><?= $page_content['cabecera']['badge'] ?? 'Legal' ?></span>
            <h1><?= $page_content['cabecera']['titulo'] ?? 'Aviso Legal' ?></h1>
        </div>
    </section>

    <section class="about-summary" style="padding: 4rem 0;">
        <div class="container text-block-readable reveal">
            <h2>1. Información General y Datos Identificativos</h2>
            <p>En cumplimiento con el deber de información dispuesto en la Ley 34/2002 de Servicios de la Sociedad de la Información y el Comercio Electrónico (LSSI-CE), se facilitan a continuación los datos de información general de este sitio web:</p>
            <ul class="styled-list">
                <li>Razón Social: <?= $legal_info['razon_social'] ?? '[RAZON SOCIAL AQUI]' ?></li>
                <li>NIF/CIF: <?= $legal_info['nif'] ?? '[NIF AQUI]' ?></li>
                <li>Dirección: <?= $legal_info['direccion'] ?? '[DIRECCION AQUI]' ?></li>
                <li>Email: <?= $legal_info['email'] ?? '[EMAIL LEGAL AQUI]' ?></li>
                <li>Datos Registrales: <?= $legal_info['datos_registrales'] ?? '[TOMO FOLIO HOJA AQUI]' ?></li>
            </ul>

            <h2 class="mt-lg">2. Propiedad Intelectual</h2>
            <p>Todos los contenidos del sitio web, incluyendo textos, fotografías, gráficos, imágenes, logotipos y diseño, son propiedad exclusiva de Advance Lexar o de terceros cuyo uso ha sido debidamente autorizado. Queda estrictamente prohibida la reproducción total o parcial sin autorización expresa.</p>

            <h2 class="mt-lg">3. Responsabilidad de uso</h2>
            <p>El uso del sitio web otorga la condición de Usuario, implicando la aceptación plena de las disposiciones incluidas en este Aviso Legal. Advance Lexar no se responsabiliza del mal uso que los usuarios puedan hacer de la información aquí expuesta.</p>
        </div>
    </section>
</main>

<?php include 'components/footer.php'; ?>
