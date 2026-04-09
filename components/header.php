<?php
/**
 * header.php - Navegación global con logo e indicador de página activa
 */
$nav_links = $content['nav_links'] ?? [];
?>
<header>
    <nav class="nav-container">
        <a href="index.php" class="logo" aria-label="Advance Lexar - Inicio">
            <img src="assets/icons/icon.svg" alt="" width="42" height="42" class="logo-icon" aria-hidden="true">
            <span class="logo-wordmark">Advance<span>Lexar</span></span>
        </a>
        <button class="menu-toggle" aria-label="Abrir menú de navegación" aria-expanded="false" aria-controls="main-nav">
            <span class="hamburger"></span>
        </button>
        <ul class="nav-links" id="main-nav">
            <?php foreach ($nav_links as $link): 
                $active_class = (isset($current_page) && $link['url'] === $current_page) ? 'class="active" aria-current="page"' : '';
            ?>
                <li><a href="<?= $link['url'] ?>" <?= $active_class ?>><?= $link['label'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
