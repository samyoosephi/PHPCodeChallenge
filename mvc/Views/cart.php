<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

        <div class="container">

            <?php if (isset($alert) && $alert): ?>
                <div class="alert"><?= $alert ?></div>
            <?php endif; ?>

            <h1>Cart Items</h1>

            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Title</th>
                    <th>Fee Price</th>
                    <th>Count</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($carts as $cart): ?>
                    <tr>
                        <td><?= $cart->id ?></td>
                        <td><?= $cart->title ?></td>
                        <td><?= $cart->price ?></td>
                        <td><?= $cart->product_count ?></td>
                        <td><?= $cart->total_price ?></td>
                        <td>
                            <a href="?controller=carts&method=add&product_id=<?= $cart->product_id ?>">Add</a>
                            <a href="?controller=carts&method=remove&product_id=<?= $cart->product_id ?>">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <h3>
                <a href="?controller=products&method=index">Back To Store</a>

                <span>Total Price: <?= $totalPrice ?></span>
            </h3>
        </div>
    </body>
</html>