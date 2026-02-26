<div class="card shadow-sm">
  <div class="card-header">Registrar solicitud</div>
  <div class="card-body">
    <?php if (!empty($errores)): ?>
      <div class="alert alert-danger"><ul class="mb-0">
        <?php foreach ($errores as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
      </ul></div>
    <?php endif; ?>

    <form method="post" action="<?= BASE_URL ?>/ejercicios/store" novalidate>
      <div class="mb-3">
        <label class="form-label">Identificación*</label>
        <input type="text" name="identificacion" class="form-control"
               value="<?= htmlspecialchars($old['identificacion'] ?? '') ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Monto (CRC)*</label>
        <input type="number" step="0.01" min="0.01" name="monto" class="form-control"
               value="<?= htmlspecialchars($old['monto'] ?? '') ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Tipo de ejercicio*</label>
        <select name="tipo" class="form-select" required>
          <option value="">-- Selecciona --</option>
          <?php foreach ($tipos as $t): ?>
            <option value="<?= $t['TipoEjercicio'] ?>"
              <?= (isset($old['tipo']) && (int)$old['tipo']===(int)$t['TipoEjercicio'])?'selected':'' ?>>
              <?= htmlspecialchars($t['DescripcionTipoEjercicio']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <!-- La Fecha no se muestra: se guarda con NOW() en el modelo -->
      <button class="btn btn-primary" type="submit">Registrar</button>
    </form>
  </div>
</div>
``