/**
 * Advance Lexar - Main Scripts
 * 
 * Gestiona: menú hamburguesa, scroll reveal, sombra dinámica del header.
 */

document.addEventListener("DOMContentLoaded", () => {
    console.log("Advance Lexar Corporate Site - Inicializado");

    // =============================================
    // 1. MENÚ HAMBURGUESA (Off-Canvas)
    // =============================================
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navLinks.classList.toggle('active');
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
        });

        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                navLinks.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // =============================================
    // 2. SOMBRA DINÁMICA DEL HEADER AL HACER SCROLL
    // =============================================
    const siteHeader = document.querySelector('header');
    if (siteHeader) {
        window.addEventListener('scroll', () => {
            siteHeader.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });
    }

    // =============================================
    // 3. SCROLL REVEAL (IntersectionObserver nativo)
    // =============================================
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Una vez revelado, dejar de observar (optimización)
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12, // Activar cuando el 12% del elemento sea visible
            rootMargin: '0px 0px -40px 0px' // Activar 40px antes del borde inferior
        });

        revealElements.forEach(el => revealObserver.observe(el));
    }
});
