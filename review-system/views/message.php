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
            <h1><?= $title ?></h1>

            <p class="message"><?= $message ?></p>

            <a href="index.php">بازگشت به صفحه اول</a>
        </div>
    </body>
</html>