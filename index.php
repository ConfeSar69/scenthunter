<?php
ob_start(); // Habilita el búfer de salida
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// Verificar si hay un parámetro 'add' en la URL
if (isset($_GET['add'])) {
    $producto = $_GET['add'];

    // Verificar si la sesión de favoritos no existe
    if (!isset($_SESSION['favoritos'])) {
        $_SESSION['favoritos'] = [];
    }

    // Verificar si el producto no está ya en favoritos
    if (!in_array($producto, $_SESSION['favoritos'])) {
        $_SESSION['favoritos'][] = $producto;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScentHunter</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<style>
  @media (min-width: 768px) {
    .main-sidebar {
      display: none !important;
    }
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    
    <?php include 'cabecera.php'; ?>
    <?php include 'menu.php'; ?>
    <?php include 'config/session.php'; ?>

    
    <div class="content-wrapper">
    <?php 
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (file_exists("pages/$page.php")) {
            include "pages/$page.php";
        } else {
            include "pages/404.php"; 
        }
    } else {
        include "pages/home.php"; 
    }
    ?>
</div>


    
    <?php include 'piedepagina.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
