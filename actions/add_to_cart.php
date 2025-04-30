<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => 1
    ];

    
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] == $product['name']) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $product;
    }
}

header("Location: ../index.php?page=cart");
exit();
?>
