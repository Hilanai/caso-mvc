<?php
// Zona horaria CR
date_default_timezone_set('America/Costa_Rica');

// Datos de conexión MySQL (XAMPP por defecto)
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'casoestudio');
define('DB_USER', 'root');
define('DB_PASS', ''); // si tu MySQL tiene clave, cámbiala aquí

// Ruta base para generar URLs (ajústala si el nombre de carpeta cambia)
define('BASE_URL', '/caso-mvc/public');
``