<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">

    <!-- LOGO -->
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="assets/img/logo.png" alt="" style="height: 40px; margin-right: 8px;">
      <strong>ScentHunter</strong>
    </a>

    <!-- MENÚ CENTRAL -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?page=products">Todos los perfumes</a></li>

        <!-- Por Género -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="generoDropdown" role="button" data-toggle="dropdown">
            Por Género
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="index.php?page=products&cat=hombre">Hombre</a>
            <a class="dropdown-item" href="index.php?page=products&cat=mujer">Mujer</a>
            <a class="dropdown-item" href="index.php?page=products&cat=unisex">Unisex</a>
          </div>
        </li>

        <!-- Por Familia -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="familiaDropdown" role="button" data-toggle="dropdown">
            Por Familia
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Amaderada</a>
            <a class="dropdown-item" href="#">Cítrica</a>
            <a class="dropdown-item" href="#">Floral</a>
            <a class="dropdown-item" href="#">Oriental</a>
          </div>
        </li>

        <!-- Por Ocasión -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ocasionDropdown" role="button" data-toggle="dropdown">
            Por Ocasión
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Uso Diario</a>
            <a class="dropdown-item" href="#">Oficina</a>
            <a class="dropdown-item" href="#">Fiesta / Nocturno</a>
          </div>
        </li>

        <li class="nav-item"><a class="nav-link" href="index.php?page=contact">Contacto</a></li>
      </ul>
    </div>

    <!-- ÍCONOS A LA DERECHA -->
    <div class="d-flex align-items-center">
      <!-- Ícono de lupa con submenu -->
      <div class="nav-item dropdown">
        <a class="nav-link text-dark" href="#" id="searchDropdown" data-toggle="dropdown" title="Buscar">
          <i class="fas fa-search"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow" style="min-width: 250px;">
          <form action="index.php?page=products" method="get" class="form-inline">
            <input type="hidden" name="page" value="products">
            <input type="text" name="search" class="form-control w-100" placeholder="Buscar perfumes...">
            <button type="submit" class="btn btn-primary btn-block mt-2">Buscar</button>
          </form>
        </div>
      </div>

      <!-- Perfil -->
      <a href="index.php?page=profile" class="nav-link text-dark" title="Perfil"><i class="fas fa-user"></i></a>
      <!-- Favoritos -->
      <a href="index.php?page=favorites" class="nav-link text-dark" title="Favoritos"><i class="fas fa-heart"></i></a>
      <!-- Carrito -->
      <a href="index.php?page=cart" class="nav-link text-dark" title="Carrito"><i class="fas fa-shopping-cart"></i></a>
    </div>

  </div>
</nav>
