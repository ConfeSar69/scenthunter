<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php?page=login");
    exit;
}

$usuario_id = $_SESSION['usuario']['id'];
$producto_id = isset($_GET['producto_id']) ? intval($_GET['producto_id']) : 0;

if ($producto_id > 0) {
    // Verifica si ya está en el carrito
    $check = $conn->prepare("SELECT * FROM carrito WHERE usuario_id = :uid AND producto_id = :pid");
    $check->execute([':uid' => $usuario_id, ':pid' => $producto_id]);

    if ($check->rowCount() > 0) {
        // Si ya está, actualiza la cantidad
        $update = $conn->prepare("UPDATE carrito SET cantidad = cantidad + 1 WHERE usuario_id = :uid AND producto_id = :pid");
        $update->execute([':uid' => $usuario_id, ':pid' => $producto_id]);
    } else {
        // Si no, lo agrega
        $insert = $conn->prepare("INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES (:uid, :pid, 1)");
        $insert->execute([':uid' => $usuario_id, ':pid' => $producto_id]);
    }

    $_SESSION['mensaje'] = "Producto agregado al carrito.";
} else {
    $_SESSION['mensaje'] = "Producto no válido.";
}

header("Location: ../index.php?page=cart");
exit;
