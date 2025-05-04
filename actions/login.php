<?php
session_start();
require_once '../config/conexion.php'; // Asegúrate de que esta ruta sea correcta

// Verificar si ya hay sesión iniciada
if (isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Por favor, completa todos los campos.";
        header("Location: ../index.php?page=login");
        exit;
    }

    // Preparar la consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verificar si se encontró el usuario
    if ($stmt->rowCount() === 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email']
            ];

            // Redirigir a la página de inicio
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
    }

    header("Location: ../index.php?page=login");
    exit;
} else {
    header("Location: ../index.php");
    exit;
}
