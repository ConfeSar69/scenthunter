<?php
if (!isset($_SESSION)) {
    session_start();
   
}
?>
<section class="content mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Crear cuenta</h3>
          </div>
          <form action="actions/register.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="nombre">Nombre completo</label>
                <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" placeholder="ejemplo@correo.com" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña segura" required>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Registrarse</button>
              <a href="index.php?page=login" class="btn btn-link">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
