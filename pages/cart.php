<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config/conexion.php';

$usuario_id = $_SESSION['usuario']['id'] ?? null;

if (!$usuario_id) {
    echo "<div class='alert alert-danger'>Inicia sesión para ver tu carrito.</div>";
    exit;
}

$stmt = $conn->prepare("SELECT c.*, p.nombre, p.precio, p.imagen 
                        FROM carrito c 
                        JOIN productos p ON c.producto_id = p.id 
                        WHERE c.usuario_id = :uid");
$stmt->execute([':uid' => $usuario_id]);
$carrito = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;
?>

<section class="content">
  <div class="container-fluid">
    <h2 class="text-center">Tu Carrito de Compras</h2>
    <?php if (count($carrito) > 0): ?>
      <form method="POST" action="/scenthunter/actions/finalizar_compra.php">
        <table class="table table-bordered mt-3">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($carrito as $item): 
              $subtotal = $item['precio'] * $item['cantidad'];
              $total += $subtotal;
            ?>
              <tr>
                <td><?= htmlspecialchars($item['nombre']) ?></td>
                <td>$<?= number_format($item['precio'], 2) ?></td>
                <td><?= $item['cantidad'] ?></td>
                <td>$<?= number_format($subtotal, 2) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3" class="text-right">Total:</th>
              <th>$<?= number_format($total, 2) ?></th>
            </tr>
          </tfoot>
        </table>

        <input type="hidden" name="total" value="<?= $total ?>">
        <button type="submit" class="btn btn-success btn-block">Finalizar compra</button>
      </form>
    <?php else: ?>
      <div class="alert alert-info mt-3">Tu carrito está vacío.</div>
    <?php endif; ?>
  </div>
</section>
