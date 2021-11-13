<?php

require($_SERVER['DOCUMENT_ROOT'] . '/controllers/dbController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/db_config.php');


$dbconf = new dbConnect;
$dbconn = $dbconf->getDbConfig();

$db = new dbController($dbconn);

$data_arr = $db->getAllPressure();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>My Health</title>
</head>

<body>
    <main class="main__wrapper">

        <div class="form__wrapper">
            <form action="" id="form_send">
                <!-- <div class="input__group">
                    <label for="date">Дата измерений</label>
                    <input type="date" name="date" id="date">
                </div> -->

                <div class="input__group">
                    <label for="pressure1">Давление</label>
                    <input type="number" name="pressure1" id="">
                </div>

                <div class="input__group">
                    <label for="pressure2">Давление</label>
                    <input type="number" name="pressure2" id="">
                </div>

                <div class="input__group">
                    <label for="pulse">Пульс</label>
                    <input type="number" name="pulse" id="">
                </div>


                <button class="btn btn__submit" type="submit">Отправить</button>
            </form>

            <form action="" id="form__delete">
                <div class="input__group">
                    <label for="curr_id">ID записи</label>
                    <input type="number" name="curr_id" id="">
                </div>

                <button class="btn btn__submit" type="submit">Удалить</button>
            </form>
        </div>

        <div class="result__wrapper">
            <table class="measure__table">
                <tr>
                    <td>id</td>
                    <!-- <td>id</td> -->
                    <td>date</td>
                    <td>time</td>
                    <td>pressure</td>
                    <td>pulse</td>
                </tr>
                <?php $index = 1; ?>
                <?php foreach ($data_arr as $data) : ?>
                    <tr>
                        <td><?= $index ?></td>
                        
                        <td><?= $data['date'] ?></td>
                        <td><?= $data['time'] ?></td>
                        <td><?= $data['pressure1'] .  " / " .  $data['pressure2']; ?></td>
                        <td><?= $data['pulse'] ?></td>
                    </tr>
                    <?php $index++; ?>
                <?php endforeach; ?>


            </table>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
</body>

</html>