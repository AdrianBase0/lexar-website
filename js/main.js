/**
 * Advance Lexar - Main Scripts
 * 
 * Este archivo manejará la navegación móvil, interacciones
 * de UI y otros scripts globales del lado del cliente.
 */

document.addEventListener("DOMContentLoaded", () => {
    // Inicialización de componentes
    console.log("Advance Lexar Corporate Site - Inicializado");

    // Lógica del Menú Hamburguesa
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navLinks.classList.toggle('active');
            
            // Accesibilidad ARIA
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
        });

        // Cerrar menú al hacer click en un enlace
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                navLinks.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }
});
