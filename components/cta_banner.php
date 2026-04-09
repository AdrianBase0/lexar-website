<?php
/**
 * cta_banner.php - Banner dinámico de cierre de página
 * Espera $cta_title y $cta_subtitle opcionalmente.
 */
?>
<section class="cta-banner">
    <div class="container reveal">
        <h2><?= $cta_title ?? '[TITULO LLAMADA ACCION FINAL]' ?></h2>
        <p><?= $cta_subtitle ?? '[SUBTITULO LLAMADA ACCION FINAL]' ?></p>
        <a href="contacto.php" class="btn btn-primary">Contáctanos</a>
    </div>
</section>
