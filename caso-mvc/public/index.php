<?php
require_once __DIR__ . '/../app/Controllers/EjerciciosController.php';
require_once __DIR__ . '/../app/Config/config.php';

$url = $_GET['url'] ?? '';
$parts = array_values(array_filter(explode('/', $url)));

if (empty($parts)) {
  // home
  $viewFile = 'home';
  include __DIR__ . '/../app/Views/layout.php';
  exit;
}

$controller = new EjerciciosController();

$resource = strtolower($parts[0] ?? 'home');
$action   = strtolower($parts[1] ?? 'index');

if ($resource === 'ejercicios') {
  if ($action === 'create')          $controller->create();
  elseif ($action === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') $controller->store();
  else                               $controller->index();
} else {
  http_response_code(404);
  echo "404 - Recurso no encontrado";
}