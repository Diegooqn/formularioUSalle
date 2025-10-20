<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mensajes Recientes - Universidad de La Salle</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    .table { width:100%; border-collapse: collapse; background:#fff; box-shadow:0 5px 20px rgba(0,0,0,.1); }
    .table th, .table td { padding: .75rem; border:1px solid #eee; text-align:left; }
    .table th{ background:#f7f7f7; color:#003b71; }
    .empty { padding:1rem; text-align:center; color:#666; background:#fff; box-shadow:0 5px 20px rgba(0,0,0,.1); }
  </style>
</head>
<body>

<header class="header">
  <div class="container header-content">
    <div class="logo">
      <h1>Universidad de La Salle</h1>
      <p class="tagline">Mensajes Recientes</p>
    </div>
    <nav class="nav">
      <a class="nav-link" href="index.php">Formulario</a>
      <a class="nav-link active" href="contacto.php">Mensajes</a>
    </nav>
  </div>
</header>

<section class="contact-section">
  <div class="container">
    <div class="contact-header">
      <h2>Mensajes recibidos</h2>
      <p>Listado en orden del más reciente al más antiguo.</p>
    </div>

    <div id="loading" class="loading">Cargando...</div>
    <div id="empty" class="empty" style="display:none;">Sin mensajes aún.</div>

    <div style="overflow:auto;">
      <table id="tabla" class="table" style="display:none;">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody id="tbody"></tbody>
      </table>
    </div>
  </div>
</section>

<script>
async function cargarMensajes() {
  const loading = document.getElementById('loading');
  const empty = document.getElementById('empty');
  const tabla = document.getElementById('tabla');
  const tbody = document.getElementById('tbody');

  loading.style.display = 'block';
  empty.style.display = 'none';
  tabla.style.display = 'none';
  tbody.innerHTML = '';

  try {
    const res = await fetch('api/listar_contactos.php');
    const data = await res.json();

    loading.style.display = 'none';

    if (!Array.isArray(data) || data.length === 0) {
      empty.style.display = 'block';
      return;
    }

    data.forEach((row, i) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${i + 1}</td>
        <td>${row.nombre ?? ''}</td>
        <td>${row.email ?? ''}</td>
        <td>${row.asunto ?? ''}</td>
        <td>${row.mensaje ?? ''}</td>
        <td>${row.fecha_envio ?? ''}</td>
      `;
      tbody.appendChild(tr);
    });

    tabla.style.display = 'table';
  } catch (e) {
    loading.textContent = 'Error cargando mensajes.';
  }
}

document.addEventListener('DOMContentLoaded', cargarMensajes);
</script>
</body>
</html>