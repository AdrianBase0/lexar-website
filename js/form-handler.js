document.addEventListener("DOMContentLoaded", () => {
    const contactForm = document.getElementById("contact-form");
    const feedbackBox = document.getElementById("form-feedback");
    const submitBtn = document.getElementById("submit_btn");

    if (contactForm) {
        contactForm.addEventListener("submit", async (e) => {
            e.preventDefault(); // Regla 07: Prevención estricta nativa JS

            // Reset UI
            feedbackBox.className = "form-feedback";
            feedbackBox.textContent = "";
            feedbackBox.style.display = "none";
            
            // Recoger valores
            const rawName = document.getElementById("full_name").value.trim();
            const rawEmail = document.getElementById("email_address").value.trim();
            const rawSubject = document.getElementById("subject").value;
            const rawMsg = document.getElementById("consult_message").value.trim();
            const trapBot = document.getElementById("trap_bot").value;
            const isPrivacyChecked = document.getElementById("privacy_policy").checked;

            // 1. HONEYPOT VALIDATION (Bloqueo agresivo si es robot)
            if (trapBot !== "") {
                // Detener en seco si cayó en la trampa
                return throwError("Comportamiento sospechoso detectado. Envío anulado.");
            }

            // 2. CAMPOS VACÍOS O ESPACIOS
            if (!rawName || !rawEmail || !rawSubject || !rawMsg) {
                return throwError("Existen campos obligatorios incompletos o vacíos.");
            }

            // 3. REGEX PARA EMAIL SEGURO
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(rawEmail)) {
                return throwError("El formato del correo electrónico ingresado no es válido.");
            }

            // 4. POLITICA CHECKBOX OBLIGATORIA
            if (!isPrivacyChecked) {
                return throwError("Debe aceptar expresamente la Política de Privacidad para proceder.");
            }

            // Si llegamos a este punto, la Validacion Frontend fue superada con éxito (100% Client-Side OK).
            // Estado de "Enviando..."
            loaderUI(true);

            // Preparar FormData para enviar
            const formData = new FormData(contactForm);

            try {
                // LLAMADA AJAX ASÍNCORNA (Fetch API nativa)
                const response = await fetch(contactForm.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok && data.status === "success") {
                    // ÉXITO
                    loaderUI(false);
                    contactForm.reset();
                    showSuccess(data.message || "Hemos recibido su comunicación correctamente. Nuestro personal de soporte se pondrá en contacto a la mayor brevedad.");
                } else {
                    // ERROR DEL SERVIDOR (400, 500)
                    throw new Error(data.message || "Ocurrió un error en el servidor procesando la solicitud.");
                }

            } catch (error) {
                loaderUI(false);
                throwError("Error de comunicación con el servidor. Inténtelo más tarde. (" + error.message + ")");
            }
        });
    }

    // Funciones de Ayuda (Alertas DOM sin usar el horrendo alert() bloqueante)
    function throwError(msg) {
        feedbackBox.textContent = msg;
        feedbackBox.classList.add("error");
        feedbackBox.style.display = "block";
    }

    function showSuccess(msg) {
        feedbackBox.textContent = msg;
        feedbackBox.classList.add("success");
        feedbackBox.style.display = "block";
    }

    function loaderUI(isLoading) {
        if (isLoading) {
            submitBtn.disabled = true;
            submitBtn.textContent = "Procesando de forma segura...";
            feedbackBox.style.display = "none";
        } else {
            submitBtn.disabled = false;
            submitBtn.textContent = "Enviar Comunicado";
        }
    }
});
