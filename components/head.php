<?php
/**
 * head.php - Metadatos, SEO y recursos estáticos
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_content['seo']['titulo'] ?? 'Advance Lexar' ?></title>
    <meta name="description" content="<?= $page_content['seo']['description'] ?? ($page_content['seo']['descripcion'] ?? '') ?>">
    
    <link rel="icon" type="image/svg+xml" href="assets/icons/icon.svg">
    <link rel="icon" type="image/webp" href="assets/icons/icon.webp">
    <link rel="stylesheet" href="css/style.css">

    <?php if (isset($current_page) && $current_page === 'index.php'): ?>
    <link rel="preload" as="image" href="assets/img/hero-principal.webp">
    <?php endif; ?>

    <?php if (isset($page_content['seo']['json_ld'])): ?>
    <script type="application/ld+json">
    <?= json_encode($page_content['seo']['json_ld'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?>
    </script>
    <?php endif; ?>
</head>
<body>
    <a href="#main-content" class="skip-link">Saltar al contenido principal</a>
