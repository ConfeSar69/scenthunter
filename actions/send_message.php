<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    
    $log = "mensajes.txt";
    $entry = "Nombre: $name\nCorreo: $email\nMensaje: $message\n--------------------\n";
    file_put_contents($log, $entry, FILE_APPEND);

    
    header("Location: ../index.php?page=contact&success=1");
    exit();
}
?>
