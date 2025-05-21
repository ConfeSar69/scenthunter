<?php
require_once 'config/conexion.php'; // Asegúrate de que este archivo retorna un objeto $conn de tipo PDO

$productos = [
  'Bleu de Chanel' => [
    'precio' => 1799,
    'img' => 'vistas/dist/img/bleudechanel.jpg',
    'descripcion' => 'Bleu de Chanel es la encarnación del hombre moderno: libre, elegante y seguro de sí mismo. Esta fragancia de la casa Chanel ofrece una mezcla refinada de frescura cítrica, notas especiadas y maderas aromáticas que crean un aroma sofisticado y poderoso. Desde el primer momento, te envuelve una vibrante combinación de limón y bergamota que se equilibra con la frescura de la menta y la calidez de la pimienta rosa. A medida que evoluciona en la piel, aparecen notas más complejas como jengibre y nuez moscada, añadiendo un toque especiado y masculino. El fondo amaderado y ahumado, con toques de incienso y sándalo, aporta profundidad y elegancia duradera. Bleu de Chanel es ideal tanto para el día como para la noche, y es perfecto para el hombre que quiere dejar una impresión inolvidable.',
    'notas' => 'Pomelo, incienso, jengibre, sándalo',
    'url' => 'https://www.chanel.com/mx/perfumes/p/107360/bleu-de-chanel-parfum/'
  ],
  'Sauvage Dior' => [
    'precio' => 1755,
    'img' => 'vistas/dist/img/diorsauvage.jpg',
    'descripcion' => 'Dior Sauvage es una fragancia intensa, magnética y libre, pensada para hombres que desafían los límites y buscan destacar con fuerza y personalidad. Inspirada en los paisajes salvajes del desierto al atardecer, esta fragancia combina la frescura de la bergamota con una explosión de especias y maderas ambaradas. El inicio es fresco, limpio y cítrico, gracias a la bergamota de Calabria, pero rápidamente da paso a un corazón vibrante con pimienta de Sichuan, lavanda y anís estrellado, que aportan energía y carisma. En el fondo, el ambroxan y el vetiver aportan profundidad, sensualidad y una estela duradera. Sauvage es una fragancia ideal para hombres audaces, modernos y seguros, perfecta para cualquier momento del día o la noche.',
    'notas' => 'Bergamota, pimienta, ambroxan',
    'url' => 'https://www.dior.com/es_mx/products/beauty-Y0996017-sauvage-eau-de-toilette'
  ],
  'Arabian Oud' => [
    'precio' => 2199,
    'img' => 'vistas/dist/img/arabianoud.avif',
    'descripcion' => 'Arabian Oud representa el lujo, la tradición y la riqueza de la perfumería oriental. Conocida mundialmente por su dominio en el uso del oud —una resina aromática preciosa y profunda— esta casa perfumista saudí ofrece experiencias olfativas exóticas e intensas. Sus perfumes suelen estar construidos sobre una base de maderas nobles, ámbar, especias y flores orientales. Al aplicarlo, se percibe una sensación cálida y envolvente, con notas que recuerdan al incienso, la resina natural y la opulencia de los mercados árabes. Ideal para quienes buscan un aroma distintivo, duradero y con una presencia imponente. Arabian Oud es más que un perfume: es una declaración de identidad, elegancia y misterio.',
    'notas' => 'Oud, rosa oriental, ámbar, almizcle',
    'url' => 'https://www.arabianoud.com/'
  ],
  'Lacoste Blanc' => [
    'precio' => 1455,
    'img' => 'vistas/dist/img/lacosteblanc.jpg',
    'descripcion' => 'Lacoste Blanc es una fragancia vibrante y limpia, pensada para hombres activos, deportivos y con estilo relajado. Inspirado en el icónico polo blanco de la marca, este perfume transmite frescura, sencillez y sofisticación en una sola botella. Abre con una mezcla cítrica de pomelo y romero, que aporta energía y vitalidad desde el primer instante. En el corazón, se descubre un toque floral elegante con ylang-ylang y nardo, que aportan una nota suave pero masculina. Finalmente, su fondo amaderado de vetiver y cuero crea una base cálida, sutil y refinada. Lacoste Blanc es perfecto para el uso diario, especialmente en climas cálidos o en actividades al aire libre, y representa al hombre moderno que aprecia la elegancia sin complicaciones.',
    'notas' => 'Pomelo, romero, cuero blanco, madera de cedro',
    'url' => 'https://www.lacoste.com/mx/lacoste-blanc/'
  ],
  'Acqua di Gio' => [
    'precio' => 1655,
    'img' => 'vistas/dist/img/acquadigio.jpg',
    'descripcion' => 'Acqua di Giò Pour Homme es la esencia del mar embotellada en una fragancia clásica y atemporal. Inspirado en la costa mediterránea italiana, este perfume captura la frescura de las olas, la brisa marina y la pureza del aire con una mezcla excepcional de notas acuáticas, cítricas y amaderadas. Su apertura con lima, bergamota y neroli es luminosa y revitalizante, perfecta para iniciar el día con energía. Luego, las notas de corazón con elementos marinos, romero y jazmín evocan el frescor del océano, mientras que el fondo de ámbar, pachulí y almizcle le da una profundidad sutil pero persistente. Acqua di Giò es ideal para hombres que aman lo natural, lo limpio y lo elegante, siendo un perfume indispensable para los días cálidos o situaciones informales con un toque de clase.',
    'notas' => 'Notas marinas, jazmín, romero, pachuli',
    'url' => 'https://www.armani.com/acqua-di-gio'
  ],
  'Tom Ford Black Orchid' => [
    'precio' => 2499,
    'img' => 'vistas/dist/img/tomfordbo3.jpg',
    'descripcion' => 'Tom Ford Black Orchid es una fragancia opulenta, misteriosa y sensual que rompe con lo convencional. Con una presencia intensa y única, esta creación unisex de Tom Ford está diseñada para quienes quieren dejar huella y no temen destacar. Desde el primer momento, la fragancia despliega una combinación lujosa de trufa negra, ylang-ylang y grosella, creando una apertura oscura y tentadora. Su corazón floral se compone de una orquídea negra exótica combinada con notas frutales y especias dulces, lo que le da un carácter sofisticado y envolvente. En el fondo, encontramos pachulí, incienso, chocolate negro y vainilla, que otorgan una base cálida, adictiva y duradera. Black Orchid es perfecto para la noche, el invierno o eventos especiales donde se busca elegancia, poder y misterio en una sola fragancia.',
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
