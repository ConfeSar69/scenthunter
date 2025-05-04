<?php
// Verifica si la sesión ya ha sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si no hay sesión iniciada, redirige a la página de inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?page=login");
    exit;
}
?>
<section class="content mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Mi Perfil</h3>
                    </div>
                    <div class="card-body">
                        <h5>Nombre: <?php echo $_SESSION['usuario']['nombre']; ?></h5>
                        <h5>Correo electrónico: <?php echo $_SESSION['usuario']['email']; ?></h5>
                        <!-- Aquí puedes agregar más detalles del perfil si lo deseas -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
