<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mensajes | lab.</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<main class="container py-5">
  <h1 class="titulo">Mensajes recibidos</h1>
  <a href="index.php" class="btn btn-outline-dark mb-4">← Volver</a>

  <?php if ($editando): ?>
  <!-- Formulario para editar (POST) -->
  <form method="post" class="row mb-4">
    <h4>Editar mensaje</h4>
    <input type="hidden" name="accion" value="actualizar">
    <input type="hidden" name="id" value="<?= $editando['id'] ?>">
    <div class="col-md-4 mb-2">
      <input name="nombre" class="form-control" required value="<?= htmlspecialchars($editando['nombre']) ?>">
    </div>
    <div class="col-md-4 mb-2">
      <input name="correo" type="email" class="form-control" required value="<?= htmlspecialchars($editando['correo']) ?>">
    </div>
    <div class="col-12 mb-2">
      <textarea name="mensaje" class="form-control" required><?= htmlspecialchars($editando['mensaje']) ?></textarea>
    </div>
    <div class="col-12">
      <button class="btn btn-dark">Actualizar</button>
      <a href="admin.php" class="btn btn-link">Cancelar</a>
    </div>
  </form>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-bordered align-middle">
      <tr><th>#</th><th>Nombre</th><th>Correo</th><th>Mensaje</th><th>Acciones</th></tr>
      <?php foreach ($contactos as $c): ?>
      <tr>
        <td><?= $c['id'] ?></td>
        <td><?= htmlspecialchars($c['nombre']) ?></td>
        <td><?= htmlspecialchars($c['correo']) ?></td>
        <td><?= htmlspecialchars($c['mensaje']) ?></td>
        <td>
          <a href="?editar=<?= $c['id'] ?>" class="btn btn-sm btn-outline-dark">Editar</a>
          <form method="post" class="d-inline" onsubmit="return confirm('¿Eliminar este mensaje?')">
            <input type="hidden" name="accion" value="eliminar">
            <input type="hidden" name="id" value="<?= $c['id'] ?>">
            <button class="btn btn-sm btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</main>
</body>
</html>
