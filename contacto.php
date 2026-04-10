<?php
/**
 * contacto.php - Formulario y datos de contacto
 */

// 1. Cargar datos del contenido JSON
$json_file = file_get_contents(__DIR__ . '/data/content.json');
$content = json_decode($json_file, true);

// 2. Extraer datos específicos de esta página
$page_content = $content['pages']['contacto'] ?? [];
$current_page = 'contacto.php';

// 3. Incluir el Head Común
include 'components/head.php';

// 4. Incluir el Header de Navegación
include 'components/header.php';
?>

<main id="main-content">
    <!-- CABECERA -->
    <section class="page-header">
        <div class="container text-center reveal">
            <span class="badge"><?= $page_content['cabecera']['badge'] ?? 'Soporte Técnico' ?></span>
            <h1><?= $page_content['cabecera']['titulo'] ?? 'Contacto y Asistencia' ?></h1>
            <p class="page-header-subtitle"><?= $page_content['cabecera']['subtitulo'] ?? 'Estamos a su entera disposición para resolver cualquier solicitud estratégica.' ?></p>
        </div>
    </section>

    <!-- CONTACT GRID -->
    <section class="pb-xxl">
        <div class="container contact-grid">
            
            <!-- CONTACT INFO PANEL -->
            <div class="contact-info reveal-left">
                <h2><?= $page_content['info_panel']['titulo'] ?? 'Advance Lexar' ?></h2>
                <p><?= $page_content['info_panel']['descripcion'] ?? 'Consultoría de alto rendimiento enfocada a resultados. Agende una reunión presencial o remota con nuestros gestores.' ?></p>

                <div class="contact-methods">
                    <div class="info-item">
                        <div class="info-item-icon">
                            <img src="https://via.placeholder.com/24x24/7d4334/ffffff?text=@" alt="" width="24" height="24">
                        </div>
                        <div class="info-item-text">
                            <span class="info-label">Email Corporativo</span>
                            <span class="info-value"><?= $content['global']['contacto_rapido']['email'] ?? 'info@advancelexar.com' ?></span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-icon">
                            <img src="https://via.placeholder.com/24x24/7d4334/ffffff?text=P" alt="" width="24" height="24">
                        </div>
                        <div class="info-item-text">
                            <span class="info-label">Atención Telefónica</span>
                            <span class="info-value"><?= $content['global']['contacto_rapido']['telefono'] ?? '[TELÉFONO AUN NO DEFINIDO]' ?></span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-item-icon">
                            <img src="https://via.placeholder.com/24x24/7d4334/ffffff?text=L" alt="" width="24" height="24">
                        </div>
                        <div class="info-item-text">
                            <span class="info-label">Sede Central</span>
                            <span class="info-value"><?= $content['global']['contacto_rapido']['direccion'] ?? '[DIRECCIÓN AUN NO DEFINIDA]' ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORMULARIO FULLSTACK -->
            <div class="contact-form-wrapper reveal-right">
                <h3><?= $page_content['formulario']['titulo'] ?? 'Envíenos un comunicado' ?></h3>
                <p class="mb-lg"><?= $page_content['formulario']['subtitulo'] ?? 'Complete el formulario y el departamento designado evaluará su situación en las primeras 48 horas operativas.' ?></p>

                <form id="contact-form" action="backend/procesar_formulario.php" method="POST" novalidate>
                    <!-- Campo Honeypot (Seguridad) -->
                    <div style="display:none">
                        <label for="trap_bot">No rellenes este campo:</label>
                        <input type="text" name="trap_bot" id="trap_bot" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="form-grid">
                        <div class="form-group floating-group">
                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder=" " required>
                            <label for="full_name">Nombre Completo</label>
                            <span class="error-text" id="error-full_name"></span>
                        </div>
                        <div class="form-group floating-group">
                            <input type="email" name="corporate_email" id="corporate_email" class="form-control" placeholder=" " required>
                            <label for="corporate_email">Correo Corporativo</label>
                            <span class="error-text" id="error-corporate_email"></span>
                        </div>
                        <div class="form-group floating-group full-width">
                            <select name="subject" id="subject" class="form-control" required>
                                <option value="" disabled selected hidden>Seleccione un área de interés</option>
                                <option value="legal">Consultoría Legal y Compliance</option>
                                <option value="economica">Consultoría Estratégica y Económica</option>
                                <option value="inmobiliaria">Gestión Inmobiliaria</option>
                                <option value="otros">Otras Consultas</option>
                            </select>
                            <label for="subject" class="select-label">Asunto de la consulta</label>
                            <span class="error-text" id="error-subject"></span>
                        </div>
                        <div class="form-group floating-group full-width">
                            <textarea name="consult_message" id="consult_message" class="form-control" rows="4" placeholder=" " required></textarea>
                            <label for="consult_message">Mensaje / Descripción del caso</label>
                            <span class="error-text" id="error-consult_message"></span>
                        </div>
                        
                        <div class="form-group full-width checkbox-group">
                            <label class="checkbox-container">
                                <input type="checkbox" name="privacy_policy" id="privacy_policy" required>
                                <span class="checkmark"></span>
                                He leído y acepto la <a href="politica-privacidad.php" target="_blank">Política de Privacidad</a>
                            </label>
                            <span class="error-text" id="error-privacy_policy"></span>
                        </div>

                        <div class="form-group full-width text-right">
                            <button type="submit" class="btn btn-primary btn-block">Enviar Solicitud</button>
                        </div>
                    </div>
                    
                    <div id="form-feedback" class="form-feedback-pill"></div>
                </form>
            </div>

        </div>
    </section>
</main>

<script src="js/form-handler.js" defer></script>
<?php include 'components/footer.php'; ?>
