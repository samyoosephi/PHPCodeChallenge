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

            <h1>New Product Form</h1>
            
            <form action="?controller=products&method=create" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>

                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>

                    <input type="number" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="maximum_count">Maximum Count Per Order</label>

                    <input type="number" name="maximum_count" id="maximum_count" class="form-control">
                </div>

                <button type="submit">Create</button>
            </form>
        </div>
    </body>
</html>