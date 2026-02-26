<div class="card shadow-sm">
  <div class="card-header">Solicitudes registradas</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead><tr>
          <th>Fecha</th><th>Monto (CRC)</th><th>Tipo de ejercicio</th><th>Identificación</th>
        </tr></thead>
        <tbody>
        <?php foreach ($solicitudes as $s): ?>
          <tr>
            <td><?= htmlspecialchars($s['Fecha']) ?></td>
            <td><?= number_format((float)$s['Monto'], 2) ?></td>
            <td><?= htmlspecialchars($s['DescripcionTipoEjercicio']) ?></td>
            <td><?= htmlspecialchars($s['Identificacion']) ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>