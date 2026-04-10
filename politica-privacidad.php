<?php
/**
 * politica-privacidad.php - Protección de datos (RGPD)
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos
$privacidad_info = $content['legal']['privacidad'] ?? [];
$page_content = $content['pages']['politica_privacidad'] ?? [];
$current_page = 'politica-privacidad.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <section class="page-header" style="padding: 4rem 0;">
        <div class="container text-center reveal">
            <span class="badge"><?= $page_content['cabecera']['badge'] ?? 'Legal' ?></span>
            <h1><?= $page_content['cabecera']['titulo'] ?? 'Política de Privacidad' ?></h1>
        </div>
    </section>

    <section class="about-summary" style="padding: 4rem 0;">
        <div class="container text-block-readable reveal">
            <h2>1. Responsable del Tratamiento</h2>
            <p>Advance Lexar es el Responsable del tratamiento de los datos personales del Usuario recopilados en este sitio web. Nuestros datos de contacto son <?= $privacidad_info['dpo_contacto'] ?? '[DIRECCION Y CORREO DPO]' ?>.</p>

            <h2 class="mt-lg">2. Finalidad de la recopilación de datos</h2>
            <p>Los datos aportados de manera voluntaria a través del formulario de contacto (Nombre, Correo Corporativo, Asunto y Mensaje) serán utilizados única y exclusivamente con el fin de evaluar la solicitud y emitir una respuesta acorde por parte de nuestro departamento de consultoría.</p>
            
            <h2 class="mt-lg">3. Legitimación y Plazos</h2>
            <p>La base legal para el tratamiento de los datos es el consentimiento expreso del interesado al marcar la casilla de verificación en el formulario. Los datos se conservarán durante <?= $privacidad_info['plazo_conservacion'] ?? '[PLAZO LEGAL AQUI]' ?> o hasta que el interesado solicite su supresión.</p>

            <h2 class="mt-lg">4. Ejercicio de Derechos (ARCO)</h2>
            <p>Cualquier persona tiene derecho a obtener confirmación sobre si estamos tratando datos personales que les conciernan. Usted tiene derecho a ejercer sus derechos de Acceso, Rectificación, Cancelación, Oposición y Portabilidad dirigiéndose por escrito a <?= $privacidad_info['email_arco'] ?? '[CORREO DPO AQUI]' ?> adjuntando su DNI.</p>
        </div>
    </section>
</main>

<?php include 'components/footer.php'; ?>
