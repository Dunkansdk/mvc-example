<?php require APP_PATH . '/view/inc/header.php'; ?>

    <h1>Soy la vista 'index.php'</h1>

    <ul>
        <?php foreach($data['products'] as $product) : ?>

            <li>
                <!-- Accedemos a todos los elementos del $products que esta en 'app/controller/PageController' -->
                <?php echo $product->nombre ?>
            </li>

        <?php endforeach; ?>

    </ul>

<?php require APP_PATH . '/view/inc/footer.php'; ?>