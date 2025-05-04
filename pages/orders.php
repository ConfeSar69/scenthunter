<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config/conexion.php'; // Ajusta la ruta según la ubicación de tu archivo


// Verifica que el usuario esté autenticado
if (!isset($_SESSION['usuario'])) {
    echo "<div class='alert alert-danger'>Por favor, inicia sesión para ver tus pedidos.</div>";
    exit;
}

// Obtén los pedidos del usuario (aquí deberías tener la lógica para obtener los pedidos desde la base de datos)
$user_id = $_SESSION['usuario']['id'];
$stmt = $conn->prepare("SELECT * FROM pedidos WHERE usuario_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="content">
    <div class="container-fluid">
        <h2 class="text-center mb-4">Mis Pedidos</h2>

        <?php if (count($pedidos) > 0): ?>
            <div class="row">
                <?php foreach ($pedidos as $pedido): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Pedido #<?= htmlspecialchars($pedido['id']) ?></h5>
                                <p class="card-text">Fecha: <?= htmlspecialchars($pedido['fecha']) ?></p>
                                <p class="card-text">Total: $<?= number_format($pedido['total'], 2) ?> MXN</p>
                                <a href="index.php?page=order_detail&id=<?= urlencode($pedido['id']) ?>" class="btn btn-info btn-sm">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center mt-4">No tienes pedidos.</div>
        <?php endif; ?>
    </div>
</section>
