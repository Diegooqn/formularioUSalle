# Formulario de Contacto - Universidad de La Salle

Proyecto PHP + MySQL publicado en InfinityFree.
- Producción: https://usalle-contactus.wuaze.com
- Requisitos: PHP 7+, MySQL
- Estructura: index.php, contacto.php, api/, config/, assets/

## Cómo correr local
1. Clona el repo.
2. Copia `config/database.sample.php` a `config/database.php` y ajusta credenciales locales.
3. Inicia Apache y MySQL (XAMPP).
4. Abre http://localhost/formulario-usalle

## APIs
- GET  /api/listar_contactos.php
- POST /api/guardar_contacto.php  (campos: nombre, email, asunto, mensaje)

## Equipo
- Diego Quintero y Matías Virgüez

## Cómo desplegar
1. Subir a InfinityFree
2. Editar config/database.php
3. Verificar conexión.

