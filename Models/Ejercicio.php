<?php // app/Models/Ejercicio.php
require_once __DIR__ . '/DB.php';

class Ejercicio {
  // Inserta una solicitud (la Fecha NO viene del formulario)
  public static function crear(string $identificacion, float $monto, int $tipoId): void {
    $pdo = DB::conn();

    // La consigna pide que la Fecha no se muestre y que se registre; usamos NOW()
    $stmt = $pdo->prepare("
      INSERT INTO ejercicios (Identificacion, Fecha, Monto, TipoEjercicio)
      VALUES (?, NOW(), ?, ?)
    ");
    $stmt->execute([$identificacion, $monto, $tipoId]);
  }

  // Lista solicitudes con join (para la pantalla de consulta)
  public static function listar(): array {
    $sql = "SELECT e.Fecha, e.Monto, e.Identificacion, t.DescripcionTipoEjercicio
            FROM ejercicios e
            JOIN tiposejercicio t ON t.TipoEjercicio = e.TipoEjercicio
            ORDER BY e.Fecha DESC, e.Consecutivo DESC";
    return DB::conn()->query($sql)->fetchAll();
  }

  // Regla: No permitir más de 2 tipos distintos por Identificación
  public static function validarMaximoTipos(string $identificacion, int $tipoId): ?string {
    $pdo = DB::conn();
    // ¿Cuántos tipos distintos ya tiene?
    $q1 = $pdo->prepare("SELECT COUNT(DISTINCT TipoEjercicio) as cant
                         FROM ejercicios WHERE Identificacion = ?");
    $q1->execute([$identificacion]);
    $cant = (int)$q1->fetch()['cant'];

    if ($cant >= 2) {
      // si ya tiene >=2 y este tipo NO lo tiene registrado, no permitir
      $q2 = $pdo->prepare("SELECT 1 FROM ejercicios 
                           WHERE Identificacion=? AND TipoEjercicio=? LIMIT 1");
      $q2->execute([$identificacion, $tipoId]);
      if (!$q2->fetch()) {
        return "No puede solicitar más de 2 tipos de ejercicio por persona.";
      }
    }
    return null;
  }
}