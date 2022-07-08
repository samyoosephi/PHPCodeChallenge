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

            <h1>Products
                <a href="?controller=products&method=form">Add</a>
            </h1>

            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Maximum Count</th>
                    <th>Add To Cart</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->title ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->maximum_count ?></td>
                        <td><a href="?controller=carts&method=add&product_id=<?= $product->id ?>">Buy</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <h3>
                <a href="?controller=carts&method=index">Display Cart</a>
            </h3>
        </div>
    </body>
</html>