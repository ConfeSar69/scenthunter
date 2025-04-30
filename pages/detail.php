<?php
$productos = [
  'Bleu de Chanel' => [
    'precio' => 1800,
    'img' => 'assets/img/bleu.jpg',
    'descripcion' => 'Bleu de Chanel es una fragancia amaderada aromática con una apertura fresca de cítricos, acompañada de notas secas y profundas como incienso, jengibre y sándalo. Diseñada para el hombre elegante y libre.',
    'notas' => 'Pomelo, incienso, jengibre, sándalo',
    'url' => 'https://www.chanel.com/mx/perfumes/p/107360/bleu-de-chanel-parfum/'
  ],
  'Sauvage Dior' => [
    'precio' => 1750,
    'img' => 'assets/img/dior.jpg',
    'descripcion' => 'Sauvage de Dior mezcla frescura salvaje con una base cálida y poderosa. Contiene bergamota de Calabria, pimienta y ambroxan, evocando un paisaje desértico bajo un cielo azul.',
    'notas' => 'Bergamota, pimienta, ambroxan',
    'url' => 'https://www.dior.com/es_mx/products/beauty-Y0996017-sauvage-eau-de-toilette'
  ],
  'Arabian Oud' => [
    'precio' => 2200,
    'img' => 'assets/img/arabian.jpg',
    'descripcion' => 'Una lujosa fragancia árabe con presencia imponente. Destaca el oud puro, la rosa oriental y un fondo de ámbar y almizcle que deja una estela inolvidable.',
    'notas' => 'Oud, rosa oriental, ámbar, almizcle',
    'url' => 'https://www.arabianoud.com/'
  ],
  'Lacoste Blanc' => [
    'precio' => 1450,
    'img' => 'assets/img/lacoste.jpg',
    'descripcion' => 'Lacoste Blanc es una fragancia limpia, fresca y versátil. Ideal para el día a día. Combina pomelo, romero y cardamomo sobre una base de cuero blanco y madera.',
    'notas' => 'Pomelo, romero, cuero blanco, madera de cedro',
    'url' => 'https://www.lacoste.com/mx/lacoste-blanc/'
  ],
  'Acqua di Gio' => [
    'precio' => 1650,
    'img' => 'assets/img/acqua.jpg',
    'descripcion' => 'Una icónica fragancia acuática inspirada en el mar Mediterráneo. Ligera pero masculina, combina notas marinas con jazmín, romero y pachuli.',
    'notas' => 'Notas marinas, jazmín, romero, pachuli',
    'url' => 'https://www.armani.com/acqua-di-gio'
  ],
  'Tom Ford Black Orchid' => [
    'precio' => 2500,
    'img' => 'assets/img/blackorchid.jpg',
    'descripcion' => 'Una fragancia oscura y opulenta, con notas de orquídea negra, trufa, chocolate negro y especias. Un perfume misterioso, sensual y lujoso.',
    'notas' => 'Orquídea negra, trufa, chocolate negro, especias',
    'url' => 'https://www.tomford.com/beauty/fragrance/black-orchid/'
  ],
];

$producto = $_GET['product'] ?? '';
$data = $productos[$producto] ?? null;
?>

<?php if ($data): ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card mb-4 shadow-sm">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="<?= $data['img'] ?>" class="img-fluid rounded-start w-100" alt="<?= $producto ?>">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h3 class="card-title"><?= $producto ?></h3>
                  <p class="card-text"><?= $data['descripcion'] ?></p>
                  <p><strong>Notas principales:</strong> <?= $data['notas'] ?></p>
                  <p><strong>Precio:</strong> $<?= number_format($data['precio'], 2) ?> MXN</p>
                  <a href="<?= $data['url'] ?>" class="btn btn-outline-info btn-sm mb-2" target="_blank">
                    Ver en sitio oficial
                  </a>
                  <br>
                  <a href="index.php?page=cart&add=<?= urlencode($producto) ?>" class="btn btn-success">
                    Agregar al carrito
                  </a>
                </div>
              </div>
            </div>
          </div>
          <a href="index.php?page=products" class="btn btn-secondary">Volver al catálogo</a>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <div class="alert alert-warning text-center mt-5">
    <h4>Producto no encontrado</h4>
    <a href="index.php?page=products" class="btn btn-dark mt-3">Volver al catálogo</a>
  </div>
<?php endif; ?>
