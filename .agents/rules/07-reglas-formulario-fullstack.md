---
trigger: always_on
---

# Reglas Full-Stack: Formulario de Contacto

## 1. Frontend: HTML y Validación Estricta (JavaScript Vanilla)
El formulario debe ser validado en el navegador antes de enviar cualquier petición al servidor para optimizar recursos y mejorar la experiencia de usuario (UX).

- **HTML Semántico:** Usar atributos nativos (`required`, `type="email"`, `minlength`).
- **Prevención de Envío:** Interceptar el evento `submit` con JavaScript y usar `e.preventDefault()`.
- **Validación JS:**
  - Comprobar que los campos no estén vacíos ni contengan solo espacios.
  - Validar el formato del correo electrónico mediante una Expresión Regular (Regex) robusta.
  - Verificar obligatoriamente que el checkbox de "Política de Privacidad" (`id="privacy_policy"`) esté marcado (`checked`).
- **Honeypot Frontend:** Incluir un campo oculto por CSS (`display:none` y `tabindex="-1"`). Si el usuario (o un bot) lo rellena, el JS debe detener el envío inmediatamente.
- **Petición AJAX:** Usar la API `fetch()` para enviar los datos por el método `POST` al archivo `procesar_formulario.php`. Mostrar estados de carga ("Enviando...") y manejar las respuestas JSON (éxito o error) actualizando el DOM sin usar `alert()`.

## 2. Backend: Procesamiento y Seguridad (PHP)
El servidor actuará como una API que recibe la petición de JS, revalida los datos por seguridad y ejecuta el envío.

- **Stack y Dependencias:** PHP 8+ nativo. Uso estricto de la librería **PHPMailer** conectada al SMTP de IONOS. Prohibido usar la función nativa `mail()`.
- **Doble Validación (Backend):** - Comprobar de nuevo que el Honeypot está vacío.
  - Sanitizar variables globales (`$_POST`) con `htmlspecialchars()` y `strip_tags()` contra inyecciones XSS.
  - Re-validar el email con `filter_var($email, FILTER_VALIDATE_EMAIL)`.
  - Confirmar que el valor de la Política de Privacidad fue recibido como verdadero. Si falla, devolver HTTP 400.
- **Respuesta de la API:** Devolver siempre respuestas en formato JSON (`Content-Type: application/json`) con códigos HTTP (200, 400, 500).

## 3. Flujo de Envíos SMTP (Doble Correo)
Tras validar todo en PHP, instanciar PHPMailer (Puerto 587, STARTTLS) y ejecutar:
1. **Notificación a Advance Lexar:** Correo a la cuenta corporativa con los datos estructurados del lead.
2. **Autorespondedor al Cliente:** Correo formal al email del usuario confirmando la recepción y estableciendo un tiempo de respuesta de 24/48 horas.