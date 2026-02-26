<?php require_once __DIR__ . '/../Config/config.php'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Casos de Estudio - MVC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= BASE_URL ?>">Casos de Estudio</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/ejercicios/create">Registrar</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/ejercicios/index">Consultar</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-4">
  <?php
    if (isset($viewFile) && file_exists(__DIR__ . '/' . $viewFile . '.php')) {
      include __DIR__ . '/' . $viewFile . '.php';
    } else {
      include __DIR__ . '/home.php';
    }
  ?>
</main>

<footer class="text-center text-muted py-4">
  <small>Bienvenido(a). Usa el menú para registrar o consultar solicitudes.</small>
</footer>

</body>
</html>