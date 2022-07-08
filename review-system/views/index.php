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
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Score</th>
                    <th>Votes Count</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($films as $film): ?>
                    <tr>
                        <td><?= $film['film_id'] ?></td>
                        <td><?= $film['title'] ?></td>
                        <td><?= $film['average_score'] ?></td>
                        <td><?= $film['votes_count'] ?></td>
                        <td><a href="vote.php?film_id=<?= $film['film_id'] ?>">Vote</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>