<?php
/**
 * footer.php - Pie de página y scripts globales
 */
$global_content = $content['global'] ?? [];
?>
    <footer>
        <div class="container footer-container">
            <div class="footer-brand">
                <img src="assets/icons/icon.svg" alt="Advance Lexar" width="44" height="44" class="footer-logo-img">
                <span class="logo-text footer-logo">Advance<span>Lexar</span></span>
                <p><?= $global_content['footer']['descripcion'] ?? '[RELLENAR →]' ?></p>
            </div>
            <div class="footer-links">
                <a href="aviso-legal.php">Aviso Legal</a>
                <a href="politica-privacidad.php">Política de Privacidad</a>
                <a href="politica-cookies.php">Política de Cookies</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> <?= $global_content['nombre_firma'] ?? 'Advance Lexar' ?>. <?= $global_content['footer']['copyright'] ?? 'Todos los derechos reservados.' ?></p>
        </div>
    </footer>

    <?php include __DIR__ . '/construction_modal.php'; ?>

    <script src="js/main.js"></script>
</body>
</html>
