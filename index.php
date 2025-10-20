<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario de Contacto - Universidad de La Salle</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

  <!-- HEADER + NAV (mismo que contacto.php) -->
  <header class="header">
    <div class="container header-content">
      <div class="logo">
        <h1>Universidad de La Salle</h1>
        <p class="tagline">Formulario de Contacto</p>
      </div>
      <nav class="nav">
        <a class="nav-link active" href="index.php">Formulario</a>
        <a class="nav-link" href="contacto.php">Mensajes</a>
      </nav>
    </div>
  </header>

  <!-- FORMULARIO -->
  <section class="contact-section">
    <div class="container">
      <div class="contact-header">
        <h2>Contáctanos</h2>
        <p>Déjanos tu mensaje y te responderemos lo antes posible.</p>
      </div>

      <div class="contact-wrapper">
        <div class="contact-form-container">
          <form id="contactForm" class="contact-form">
            <div class="form-group">
              <label for="nombre">Nombre <span class="required">*</span></label>
              <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="email">Correo electrónico <span class="required">*</span></label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="asunto">Asunto <span class="required">*</span></label>
              <input type="text" id="asunto" name="asunto" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="mensaje">Mensaje <span class="required">*</span></label>
              <textarea id="mensaje" name="mensaje" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-submit">Enviar</button>
          </form>

          <div id="respuesta" class="alert" style="display:none;"></div>
        </div>

        <!-- Columna info opcional -->
        <div class="contact-info">
          <h3>Información de contacto</h3>
          <div class="info-item"><div class="info-icon">📍</div><div><strong>Dirección</strong><p>Bogotá, Colombia</p></div></div>
          <div class="info-item"><div class="info-icon">📞</div><div><strong>Teléfono</strong><p>(+57) 320 000 0000</p></div></div>
          <div class="info-item"><div class="info-icon">✉️</div><div><strong>Email</strong><p>contacto@unisalle.edu.co</p></div></div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container footer-bottom">
      <p>© 2025 Universidad de La Salle. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script src="assets/js/validaciones.js"></script>
</body>
</html>