<?php // app/Models/TipoEjercicio.php
require_once __DIR__ . '/DB.php';

class TipoEjercicio {
  public static function all(): array {
    $sql = "SELECT TipoEjercicio, DescripcionTipoEjercicio FROM tiposejercicio ORDER BY 1";
    return DB::conn()->query($sql)->fetchAll();
  }
}