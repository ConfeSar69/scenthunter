<section class="content-header">
  <h1 class="text-center mb-4">Catálogo de Perfumes</h1>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <?php
      $productos = [
        [
          'nombre' => 'Bleu de Chanel',
          'precio' => 1800,
          'img' => 'assets/img/bleu.jpg',
          'descripcion' => 'Una fragancia elegante y atemporal con notas de madera y cítricos.'
        ],
        [
          'nombre' => 'Sauvage Dior',
          'precio' => 1750,
          'img' => 'assets/img/dior.jpg',
          'descripcion' => 'Perfume intenso con bergamota, pimienta y ambroxan.'
        ],
        [
          'nombre' => 'Arabian Oud',
          'precio' => 2200,
          'img' => 'assets/img/arabian.jpg',
          'descripcion' => 'Esencia oriental con oud, rosa y almizcle.'
        ],
        [
          'nombre' => 'Lacoste Blanc',
          'precio' => 1450,
          'img' => 'assets/img/lacoste.jpg',
          'descripcion' => 'Fragancia fresca con notas cítricas y florales.'
        ],
        [
          'nombre' => 'Acqua di Gio',
          'precio' => 1650,
          'img' => 'assets/img/acqua.jpg',
          'descripcion' => 'Clásico aroma marino con matices herbales.'
        ],
        [
          'nombre' => 'Tom Ford Black Orchid',
          'precio' => 2500,
          'img' => 'assets/img/blackorchid.jpg',
          'descripcion' => 'Lujosa y oscura fragancia con orquídea negra y trufa.'
        ],
      ];

      foreach ($productos as $p): ?>
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
      <?php endforeach; ?>
    </div>
  </div>
</section>
