<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/conexion.php';

$user_id = $_SESSION['usuario']['id'] ?? null; // Obtener el ID del usuario desde la sesión

if (!$user_id) {
    echo "<div class='alert alert-danger'>Por favor, inicia sesión para ver tus favoritos.</div>";
    exit;
}

// Obtener los productos favoritos del usuario
$stmt = $conn->prepare("SELECT p.* FROM productos p 
                       JOIN favoritos f ON p.id = f.producto_id 
                       WHERE f.usuario_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="content">
  <div class="container-fluid">
    <h2 class="text-center mb-4">Tus Productos Favoritos</h2>

    <?php if (count($favoritos) > 0): ?>
      <div class="row">
        <?php foreach ($favoritos as $favorito): ?>
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
              <!-- Mostrar la imagen del producto -->
              <?php
                // Si la imagen existe en la base de datos, construimos la ruta correctamente
                if (isset($favorito['imagen'])) {
                    $imgPath = '/scenthunter/' . htmlspecialchars($favorito['imagen']);
                    echo '<img src="' . $imgPath . '" class="card-img-top" alt="' . htmlspecialchars($favorito['nombre']) . '">';
                } else {
                    echo '<img src="/scenthunter/vistas/dist/img/default.jpg" class="card-img-top" alt="Imagen no disponible">';
                }
              ?>
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($favorito['nombre']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($favorito['descripcion']) ?></p>
                <p><strong>Precio:</strong> $<?= number_format($favorito['precio'], 2) ?> MXN</p>
                <a href="index.php?page=detail&product=<?= urlencode($favorito['nombre']) ?>" class="btn btn-info btn-sm">Ver Detalles</a>
                <a href="index.php?page=cart&add=<?= urlencode($favorito['nombre']) ?>" class="btn btn-success btn-sm mt-2">Agregar al Carrito</a>
                <!-- Botón para eliminar de favoritos -->
                <a href="actions/eliminar_favorito.php?producto_id=<?= urlencode($favorito['id']) ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('¿Estás seguro de eliminar este producto de tus favoritos?');">Eliminar de Favoritos</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-warning text-center mt-4">No tienes productos en tus favoritos.</div>
    <?php endif; ?>

  </div>
</section>

