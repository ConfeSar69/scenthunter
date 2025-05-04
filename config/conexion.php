<?php
$host = 'localhost';
$dbname = 'scenthunter';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=scenthunter;charset=utf8", $username, $password);
    // Opcional: establecer errores de PDO como excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>