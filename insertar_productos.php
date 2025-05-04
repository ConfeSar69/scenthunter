<?php
require_once 'config/conexion.php'; // Asegúrate de que este archivo retorna un objeto $conn de tipo PDO

$productos = [
  'Bleu de Chanel' => [
    'precio' => 1799,
    'img' => 'vistas/dist/img/bleudechanel.jpg',
    'descripcion' => 'Bleu de Chanel es una fragancia amaderada aromática...',
    'notas' => 'Pomelo, incienso, jengibre, sándalo',
    'url' => 'https://www.chanel.com/mx/perfumes/p/107360/bleu-de-chanel-parfum/'
  ],
  'Sauvage Dior' => [
    'precio' => 1755,
    'img' => 'vistas/dist/img/diorsauvage.jpg',
    'descripcion' => 'Sauvage de Dior mezcla frescura salvaje con una base cálida...',
    'notas' => 'Bergamota, pimienta, ambroxan',
    'url' => 'https://www.dior.com/es_mx/products/beauty-Y0996017-sauvage-eau-de-toilette'
  ],
  'Arabian Oud' => [
    'precio' => 2199,
    'img' => 'vistas/dist/img/arabianoud.avif',
    'descripcion' => 'Una lujosa fragancia árabe con presencia imponente...',
    'notas' => 'Oud, rosa oriental, ámbar, almizcle',
    'url' => 'https://www.arabianoud.com/'
  ],
  'Lacoste Blanc' => [
    'precio' => 1455,
    'img' => 'vistas/dist/img/lacosteblanc.jpg',
    'descripcion' => 'Lacoste Blanc es una fragancia limpia, fresca y versátil...',
    'notas' => 'Pomelo, romero, cuero blanco, madera de cedro',
    'url' => 'https://www.lacoste.com/mx/lacoste-blanc/'
  ],
  'Acqua di Gio' => [
    'precio' => 1655,
    'img' => 'vistas/dist/img/acquadigio.jpg',
    'descripcion' => 'Una icónica fragancia acuática inspirada en el mar Mediterráneo...',
    'notas' => 'Notas marinas, jazmín, romero, pachuli',
    'url' => 'https://www.armani.com/acqua-di-gio'
  ],
  'Tom Ford Black Orchid' => [
    'precio' => 2499,
    'img' => 'vistas/dist/img/tomfordbo3.jpg',
    'descripcion' => 'Una fragancia oscura y opulenta, con notas de orquídea negra...',
    'notas' => 'Orquídea negra, trufa, chocolate negro, especias',
    'url' => 'https://www.tomford.com/beauty/fragrance/black-orchid/'
  ]
];

foreach ($productos as $nombre => $info) {
    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, notas, precio, imagen, url) VALUES (:nombre, :descripcion, :notas, :precio, :imagen, :url)");
    $stmt->execute([
        ':nombre' => $nombre,
        ':descripcion' => $info['descripcion'],
        ':notas' => $info['notas'],
        ':precio' => $info['precio'],
        ':imagen' => $info['img'],
        ':url' => $info['url']
    ]);
    echo "Insertado: $nombre<br>";
}

echo "Todos los productos fueron insertados correctamente.";
