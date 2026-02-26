<?php
require_once __DIR__ . '/../Models/Ejercicio.php';
require_once __DIR__ . '/../Models/TipoEjercicio.php';
require_once __DIR__ . '/../Config/config.php';

class EjerciciosController {
  public function index() {
    $solicitudes = Ejercicio::listar();
    $this->render('ejercicios/index', compact('solicitudes'));
  }

  public function create() {
    $tipos = TipoEjercicio::all();
    $errores = [];
    $old = [];
    $this->render('ejercicios/create', compact('tipos','errores','old'));
  }

  public function store() {
    $identificacion = trim($_POST['identificacion'] ?? '');
    $monto = trim($_POST['monto'] ?? '');
    $tipo = (int)($_POST['tipo'] ?? 0);

    $errores = [];

    if ($identificacion === '') $errores[] = 'Identificación es obligatoria.';
    if ($monto === '' || !is_numeric($monto) || (float)$monto <= 0) $errores[] = 'Monto debe ser numérico y mayor a 0.';
    if ($tipo <= 0) $errores[] = 'Debe seleccionar un tipo de ejercicio.';

    // Validación de negocio: máximo 2 tipos por identificación
    if (!$errores) {
      if ($msg = Ejercicio::validarMaximoTipos($identificacion, $tipo)) {
        $errores[] = $msg;
      }
    }

    if ($errores) {
      $tipos = TipoEjercicio::all();
      $old = $_POST;
      return $this->render('ejercicios/create', compact('tipos','errores','old'));
    }

    try {
      Ejercicio::crear($identificacion, (float)$monto, $tipo);
      header('Location: ' . BASE_URL . '/ejercicios/index');
      exit;
    } catch (Throwable $e) {
      $tipos = TipoEjercicio::all();
      $errores[] = 'Error al registrar: ' . $e->getMessage();
      $old = $_POST;
      return $this->render('ejercicios/create', compact('tipos','errores','old'));
    }
  }

  private function render(string $view, array $params = []) {
    extract($params);
    $viewFile = $view; // ej: 'ejercicios/create'
    include __DIR__ . '/../Views/layout.php';
  }
}