<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>سامانه ثبت نقد و بررسی</title>
        <style>
            body{
                background-color: #cccccc;
            }

            .container {
                width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
            }

            h1 {
                border-bottom: 1px dashed #ccc;
                text-align: center;
            }

            .parameter{
                margin-bottom: 30px;
            }

            table, td, th {
                border: 1px solid black;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th {
                height: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Vote</h1>

            <form action="vote.php" method="post">
                <input type="hidden" name="film_id" value="<?= $film_id ?>">

                <?php foreach ($parameters as $parameter): ?>
                    <div class="parameter">
                        <label for=""><?= $parameter['title'] ?></label>

                        <select name="scores[<?= $parameter['id'] ?>]">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                <?php endforeach; ?>

                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>