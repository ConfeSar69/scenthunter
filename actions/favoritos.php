<?php
session_start();
require_once '../config/conexion.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php?page=login");
    exit;
}

// Obtener el ID del usuario desde la sesión
$usuario_id = $_SESSION['usuario']['id']; // Asegúrate de usar 'usuario' en lugar de 'usuario_id'

// Obtener el ID del producto desde la URL
$producto_id = isset($_GET['producto_id']) ? intval($_GET['producto_id']) : 0;

if ($producto_id > 0) {
    // Verificar si el producto ya está en favoritos
    $check = $conn->prepare("SELECT * FROM favoritos WHERE usuario_id = :uid AND producto_id = :pid");
    $check->execute([':uid' => $usuario_id, ':pid' => $producto_id]);

    if ($check->rowCount() == 0) {
        // Insertar el producto en favoritos
        $insert = $conn->prepare("INSERT INTO favoritos (usuario_id, producto_id) VALUES (:uid, :pid)");
        $insert->execute([':uid' => $usuario_id, ':pid' => $producto_id]);
        $_SESSION['mensaje'] = "Producto agregado a favoritos.";
    } else {
        $_SESSION['mensaje'] = "Este producto ya está en tus favoritos.";
    }
} else {
    $_SESSION['mensaje'] = "Producto no válido.";
}

// Redirigir al listado de favoritos
header("Location: ../index.php?page=favorites");
exit;

