<?php


// Redirigir si el usuario ya está logueado
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>
<section class="content mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Iniciar sesión</h3>
          </div>

          <form action="actions/login.php" method="POST">
            <div class="card-body">

              <!-- Mostrar errores si existen -->
              <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                  <?php echo $_SESSION['error']; ?>
                  <?php unset($_SESSION['error']); // Limpiar el mensaje de error ?>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" placeholder="Correo registrado" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Tu contraseña" required>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-dark">Ingresar</button>
              <a href="index.php?page=register" class="btn btn-link">¿No tienes cuenta? Regístrate</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
