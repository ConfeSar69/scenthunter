<!-- Banner estilo Arome -->
<div id="mainBanner" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/banner1.jpg" class="d-block w-100" alt="Promo 1">
    </div>
    <div class="carousel-item">
      <img src="assets/img/banner2.jpg" class="d-block w-100" alt="Promo 2">
    </div>
  </div>
  <a class="carousel-control-prev" href="#mainBanner" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#mainBanner" role="button" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!-- Categorías de perfumes -->
<section class="mt-5 text-center">
  <h2 class="mb-4">Explora por Categoría</h2>
  <div class="row">
    <div class="col-md-3">
      <div class="card shadow-sm">
        <img src="assets/img/arabes.jpg" class="card-img-top" alt="Árabes">
        <div class="card-body">
          <h5 class="card-title">Perfumes Árabes</h5>
          <a href="index.php?page=products&cat=arabes" class="btn btn-outline-dark btn-sm">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <img src="assets/img/hombre.jpg" class="card-img-top" alt="Hombre">
        <div class="card-body">
          <h5 class="card-title">Hombre</h5>
          <a href="index.php?page=products&cat=hombre" class="btn btn-outline-dark btn-sm">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <img src="assets/img/mujer.jpg" class="card-img-top" alt="Mujer">
        <div class="card-body">
          <h5 class="card-title">Mujer</h5>
          <a href="index.php?page=products&cat=mujer" class="btn btn-outline-dark btn-sm">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <img src="assets/img/unisex.jpg" class="card-img-top" alt="Unisex">
        <div class="card-body">
          <h5 class="card-title">Unisex</h5>
          <a href="index.php?page=products&cat=unisex" class="btn btn-outline-dark btn-sm">Ver más</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Más vendidos -->
<section class="mt-5">
  <h2 class="mb-4 text-center">Top Perfumes</h2>
  <div class="row">
    <?php
    $productos = [
      ['img' => 'vistas/dist/img/bleudechanel.jpg', 'nombre' => 'Bleu de Chanel', 'precio' => 1800],
      ['img' => 'vistas/dist/img/diorsauvage.jpg', 'nombre' => 'Sauvage Dior', 'precio' => 1750],
      ['img' => 'vistas/dist/img/arabianoud.avif', 'nombre' => 'Arabian Oud', 'precio' => 2200],
      ['img' => 'vistas/dist/img/lacosteblanc.jpg', 'nombre' => 'Lacoste Blanc', 'precio' => 1450],
    ];
    foreach ($productos as $p): ?>
      <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100">
          <img src="<?= $p['img'] ?>" class="card-img-top" alt="<?= $p['nombre'] ?>">
          <div class="card-body text-center">
            <h5 class="card-title"><?= $p['nombre'] ?></h5>
            <p class="card-text">$<?= number_format($p['precio'], 2) ?> MXN</p>
            <a href="index.php?page=detail&product=<?= urlencode($p['nombre']) ?>" class="btn btn-dark btn-sm">Leer más</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Beneficios / Ventajas -->
<section class="py-5 bg-light mt-5">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <i class="fas fa-shipping-fast fa-2x text-info mb-2"></i>
        <h5>Envío Express</h5>
        <p>Recibe tu pedido en 24-48h a nivel nacional.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="fas fa-shield-alt fa-2x text-success mb-2"></i>
        <h5>100% Original</h5>
        <p>Garantizamos perfumes auténticos con sello de garantía.</p>
      </div>
      <div class="col-md-4 mb-4">
        <i class="fas fa-headset fa-2x text-primary mb-2"></i>
        <h5>Soporte Personalizado</h5>
        <p>Estamos disponibles por WhatsApp y correo para ayudarte.</p>
      </div>
    </div>
  </div>
</section>

<!-- Sobre Nosotros -->
<section class="container my-5">
  <div class="row">
    <div class="col text-center">
      <h2>¿Quiénes somos?</h2>
      <p class="mt-3">
        En <strong>ScentHunter</strong> nos apasiona el arte de las fragancias. Nos dedicamos a ofrecer perfumes de calidad, exclusivos y a precios accesibles. Ya sea que busques una esencia elegante, fresca, intensa o sensual, tenemos algo para ti.
        <br><br>
        Nos inspiran las historias detrás de cada aroma, y nuestro compromiso es brindarte una experiencia de compra única, con atención profesional y entrega rápida.
      </p>
    </div>
  </div>
</section>
