<?php
session_start();
require '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
  try {
    $stmt->execute([$nombre, $email, $password]);
    header("Location: ../index.php?page=login&registro=exitoso");
  } catch (PDOException $e) {
    header("Location: ../index.php?page=register&error=correo_existente");
  }
}
