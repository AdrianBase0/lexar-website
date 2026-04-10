document.addEventListener("DOMContentLoaded", () => {
    const contactForm = document.getElementById("contact-form");
    const feedbackBox = document.getElementById("form-feedback");
    // El botón de submit se selecciona desde el form para no depender de un ID externo
    const submitBtn = contactForm ? contactForm.querySelector("button[type='submit']") : null;

    if (contactForm) {
        contactForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            // Reset general
            clearErrors();
            feedbackBox.className = "form-feedback";
            feedbackBox.textContent = "";
            feedbackBox.style.display = "none";
            
            // Recoger valores
            const rawName = document.getElementById("full_name").value.trim();
            const rawEmail = document.getElementById("corporate_email").value.trim();
            const rawSubject = document.getElementById("subject").value;
            const rawMsg = document.getElementById("consult_message").value.trim();
            const trapBot = document.getElementById("trap_bot").value;
            const isPrivacyChecked = document.getElementById("privacy_policy").checked;

            // 1. HONEYPOT
            if (trapBot !== "") {
                return throwGlobalError("Comportamiento sospechoso detectado. Envío anulado.");
            }

            // 2. VALIDACIONES INLINE (Acumulativas)
            let isFormValid = true;

            if (!rawName) {
                showFieldError("full_name", "Este campo es obligatorio.");
                isFormValid = false;
            } else if (rawName.length < 3) {
                showFieldError("full_name", "Introduzca al menos 3 caracteres.");
                isFormValid = false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!rawEmail) {
                showFieldError("corporate_email", "El correo es obligatorio.");
                isFormValid = false;
            } else if (!emailRegex.test(rawEmail)) {
                showFieldError("corporate_email", "Formato de correo no válido.");
                isFormValid = false;
            }

            if (!rawSubject) {
                showFieldError("subject", "Debe seleccionar un departamento.");
                isFormValid = false;
            }

            if (!rawMsg) {
                showFieldError("consult_message", "El detalle de la consulta es obligatorio.");
                isFormValid = false;
            } else if (rawMsg.length < 10) {
                showFieldError("consult_message", "La longitud mínima es de 10 caracteres.");
                isFormValid = false;
            }

            if (!isPrivacyChecked) {
                showFieldError("privacy_policy", "La aceptación de la política es obligatoria.", true);
                isFormValid = false;
            }

            // Detener el flujo si hay algún campo marcado en rojo
            if (!isFormValid) {
                return;
            }

            // Si llegamos a este punto, 100% Client-Side OK
            loaderUI(true);
            const formData = new FormData(contactForm);

            try {
                const response = await fetch(contactForm.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    headers: { 'Accept': 'application/json' }
                });

                const data = await response.json();

                if (response.ok && data.status === "success") {
                    loaderUI(false);
                    contactForm.reset();
                    showSuccess(data.message || "Solicitud procesada con éxito.");
                } else {
                    throw new Error(data.message || "Error del servidor.");
                }

            } catch (error) {
                loaderUI(false);
                throwGlobalError("Error de red. Inténtelo más tarde. (" + error.message + ")");
            }
        });
    }

    // --- Helpers Validation UI --- //

    function clearErrors() {
        // Remover clases de inputs y checkboxes
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        // Vaciar y ocultar labels de error
        document.querySelectorAll('.error-text').forEach(el => {
            el.textContent = "";
            el.classList.remove('active');
        });
    }

    function showFieldError(inputId, message, isCheckbox = false) {
        const inputEl = document.getElementById(inputId);
        // Los spans tienen id="error-CAMPO" (con guion, no guion bajo)
        const errorSpan = document.getElementById("error-" + inputId);
        
        if (errorSpan) {
            errorSpan.textContent = message;
            errorSpan.classList.add("active");
        }
        
        if (inputEl) {
            if (isCheckbox) {
                // Marcar el .checkbox-group contenedor
                const wrapper = inputEl.closest(".checkbox-group");
                if (wrapper) wrapper.classList.add("is-invalid");
            } else {
                inputEl.classList.add("is-invalid");
            }
        }
    }

    function throwGlobalError(msg) {
        feedbackBox.textContent = msg;
        feedbackBox.className = "form-feedback error";
    }

    function showSuccess(msg) {
        feedbackBox.textContent = msg;
        feedbackBox.className = "form-feedback success";
    }

    function loaderUI(isLoading) {
        if (!submitBtn) return;
        if (isLoading) {
            submitBtn.disabled = true;
            submitBtn.textContent = "Procesando de forma segura...";
            if (feedbackBox) feedbackBox.style.display = "none";
        } else {
            submitBtn.disabled = false;
            submitBtn.textContent = "Enviar Solicitud";
        }
    }
});
