<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/conexion.php'; // Conexión con la base de datos ($ccon)

$producto = $_GET['product'] ?? ''; // Obtener el nombre del producto desde la URL
$data = null; // Variable donde se almacenarán los detalles del producto

// Verificar si se ha proporcionado el nombre del producto
if ($producto) {
    // Preparar la consulta SQL para obtener los detalles del producto
    $stmt = $conn->prepare("SELECT * FROM productos WHERE nombre = :producto");
    $stmt->bindParam(':producto', $producto, PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC); // Obtener los datos del producto

    // Debugging: ver el contenido de $data
    //var_dump($data); // Esto imprimirá el array $data y nos ayudará a identificar si la clave 'img' existe.

    // Si no se encuentra el producto, mostramos un mensaje
    if (!$data) {
        echo "<div class='alert alert-danger text-center mt-4'>Producto no encontrado</div>";
    }
}
?>

<?php if ($data): ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card mb-4 shadow-sm">
            <div class="row g-0">
              <div class="col-md-5">
                <!-- Mostrar la imagen del producto -->
                <?php
                if (isset($data['imagen'])) {
                    $imgPath = '/scenthunter/' . htmlspecialchars($data['imagen']);
                    echo '<img src="' . $imgPath . '" class="img-fluid rounded-start w-100" alt="' . htmlspecialchars($data['nombre']) . '">';
                } else {
                    echo '<p>Imagen no disponible</p>';
                }
                ?>
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h3 class="card-title"><?= htmlspecialchars($data['nombre']) ?></h3>
                  <p class="card-text"><?= nl2br(htmlspecialchars($data['descripcion'])) ?></p>
                  <p><strong>Notas principales:</strong> <?= htmlspecialchars($data['notas']) ?></p>
                  <p><strong>Precio:</strong> $<?= number_format($data['precio'], 2) ?> MXN</p>

                  <!-- Enlace a la página oficial del producto -->
                  <a href="<?= htmlspecialchars($data['url']) ?>" class="btn btn-outline-info btn-sm mb-2" target="_blank">
                    Ver en sitio oficial
                  </a>
                  <br>

                  <!-- Botón para agregar al carrito -->
                  <a href="actions/add_to_cart.php?producto_id=<?= $data['id'] ?>" class="btn btn-success">
                    Agregar al carrito
                  </a>
                  <br>

                  <!-- Botón para agregar a favoritos -->
                  <a href="actions/favoritos.php?producto_id=<?= urlencode($data['id']) ?>" class="btn btn-warning">Agregar a Favoritos</a>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Botón para volver al catálogo -->
          <a href="index.php?page=products" class="btn btn-secondary">Volver al catálogo</a>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <div class="alert alert-warning text-center mt-5">
    <h4>Producto no encontrado</h4>
    <a href="index.php?page=products" class="btn btn-dark mt-3">Volver al catálogo</a>
  </div>
<?php endif; ?>
