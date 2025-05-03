<?php
// Lista de productos
$productos = [
  [
    'nombre' => 'Bleu de Chanel',
    'precio' => 1799,
    'img' => 'vistas/dist/img/bleudechanel.jpg',
    'descripcion' => 'Una fragancia elegante y atemporal con notas de madera y cítricos.'
  ],
  [
    'nombre' => 'Sauvage Dior',
    'precio' => 1755,
    'img' => 'vistas/dist/img/diorsauvage.jpg',
    'descripcion' => 'Perfume intenso con bergamota, pimienta y ambroxan.'
  ],
  [
    'nombre' => 'Arabian Oud',
    'precio' => 2199,
    'img' => 'vistas/dist/img/arabianoud.avif',
    'descripcion' => 'Esencia oriental con oud, rosa y almizcle.'
  ],
  [
    'nombre' => 'Lacoste Blanc',
    'precio' => 1455,
    'img' => 'vistas/dist/img/lacosteblanc.jpg',
    'descripcion' => 'Fragancia fresca con notas cítricas y florales.'
  ],
  [
    'nombre' => 'Acqua di Gio',
    'precio' => 1655,
    'img' => 'vistas/dist/img/acquadigio.jpg',
    'descripcion' => 'Clásico aroma marino con matices herbales.'
  ],
  [
    'nombre' => 'Tom Ford Black Orchid',
    'precio' => 2499,
    'img' => 'vistas/dist/img/tomfordbo3.jpg',
    'descripcion' => 'Lujosa y oscura fragancia con orquídea negra y trufa.'
  ],
];

// Buscar si hay término en la URL
$resultados = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
  $termino = strtolower(trim($_GET['search']));
  foreach ($productos as $p) {
    if (strpos(strtolower($p['nombre']), $termino) !== false) {
      $resultados[] = $p;
    }
  }
} else {
  $resultados = $productos;
}
?>

<!-- CABECERA -->
<section class="content-header">
  <h1 class="text-center mb-4">Catálogo de Perfumes</h1>
</section>

<!-- CONTENIDO -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <?php if (count($resultados) === 0): ?>
        <div class="col-12 text-center">
          <h4 class="text-muted">No encontramos ningún perfume con ese nombre.</h4>
          <p>Intenta con otro término de búsqueda.</p>
          <a href="index.php?page=products" class="btn btn-outline-dark mt-3">Volver al catálogo</a>
        </div>
      <?php else:
        foreach ($resultados as $p): ?>
          <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
              <img src="<?= $p['img'] ?>" class="card-img-top" alt="<?= $p['nombre'] ?>">
              <div class="card-body text-center">
                <h5 class="card-title"><?= $p['nombre'] ?></h5>
                <p class="card-text"><?= $p['descripcion'] ?></p>
                <p><strong>$<?= number_format($p['precio'], 2) ?> MXN</strong></p>
                <a href="index.php?page=detail&product=<?= urlencode($p['nombre']) ?>" class="btn btn-dark btn-sm">Leer más</a>
              </div>
            </div>
          </div>
        <?php endforeach;
      endif; ?>

    </div>
  </div>
</section>
