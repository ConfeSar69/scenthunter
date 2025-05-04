<?php
session_start();
require_once '../config/conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php?page=login");
    exit;
}

$user_id = $_SESSION['usuario']['id']; // Obtener el ID del usuario desde la sesión

if (isset($_GET['producto_id'])) {
    $producto_id = intval($_GET['producto_id']); // Obtener el ID del producto a eliminar

    // Eliminar el producto de los favoritos
    $stmt = $conn->prepare("DELETE FROM favoritos WHERE usuario_id = :user_id AND producto_id = :producto_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
    $stmt->execute();

    $_SESSION['mensaje'] = "Producto eliminado de favoritos.";

    // Redirigir de nuevo a la página de favoritos
    header("Location: ../index.php?page=favorites");
    exit;
} else {
    // Si no se ha proporcionado un ID de producto, redirigir a la página de favoritos
    header("Location: ../index.php?page=favorites");
    exit;
}
