<section class="content">
    <div class="container-fluid">
        <h2 class="text-center">🛒 Tu Carrito de Compras</h2>

        <?php if (empty($_SESSION['cart'])) : ?>
            <p class="text-center">Tu carrito está vacío.</p>
        <?php else : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td>$<?= number_format((float) str_replace(',', '', $item['price']) * (int) $item['quantity'], 2) ?></td>

                            <td><?= $item['quantity'] ?></td>
                            <td>$<?= number_format((float) str_replace(',', '', $item['price']) * (int) $item['quantity'], 2) ?></td>

                            <td>
                                <a href="actions/remove_from_cart.php?key=<?= $key ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        <?php $total += (float) str_replace(',', '', $item['price']) * (int) $item['quantity']; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4 class="text-right">Total: $<?= number_format($total, 2) ?></h4>
            <a href="actions/clear_cart.php" class="btn btn-warning">Vaciar Carrito</a>
        <?php endif; ?>
    </div>
</section>
