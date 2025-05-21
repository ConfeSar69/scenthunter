<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once '../config/conexion.php';
require_once '../config/email_config.php'; // Tu función enviarCorreoConfirmacion

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php?page=login");
    exit;
}

$usuario_id = $_SESSION['usuario']['id'];

// Obtener carrito desde BD
$stmtCarrito = $conn->prepare("SELECT producto_id, cantidad FROM carrito WHERE usuario_id = ?");
$stmtCarrito->execute([$usuario_id]);
$cart = $stmtCarrito->fetchAll(PDO::FETCH_KEY_PAIR); // producto_id => cantidad

if (empty($cart)) {
    $_SESSION['mensaje'] = "El carrito está vacío.";
    header("Location: ../index.php?page=cart");
    exit;
}

$total = $_POST['total'] ?? 0;

// Insertar pedido
$stmt = $conn->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");
$stmt->execute([$usuario_id, $total]);
$pedido_id = $conn->lastInsertId();

// Insertar detalle de pedido
$stmtDetalle = $conn->prepare("INSERT INTO detalle_pedidos (pedido_id, producto_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");

foreach ($cart as $producto_id => $cantidad) {
    $stmtProducto = $conn->prepare("SELECT precio FROM productos WHERE id = ?");
    $stmtProducto->execute([$producto_id]);
    $producto = $stmtProducto->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        $stmtDetalle->execute([$pedido_id, $producto_id, $cantidad, $producto['precio']]);
    }
}

// Enviar correo al usuario actual (¡corregido aquí!)
if (!enviarCorreoConfirmacion($_SESSION['usuario']['email'], $_SESSION['usuario']['nombre'], $pedido_id, $total)) {
    error_log("No se pudo enviar el correo de confirmación.");
}

// Vaciar carrito
$stmtEliminar = $conn->prepare("DELETE FROM carrito WHERE usuario_id = ?");
$stmtEliminar->execute([$usuario_id]);
unset($_SESSION['cart']);

header("Location: ../index.php?page=orders");
exit;
