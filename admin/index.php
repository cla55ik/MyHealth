<?php
session_start();
// echo $_SESSION["access_admin"];

if (!isset($_SESSION["access_admin"])) {
    header("Location: /login.php");
}

$page_title = 'My Health admin';
require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/dbController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/db_config.php');


$dbconf = new dbConnect;
$dbconn = $dbconf->getDbConfig();

$db = new dbController($dbconn);

$data_arr = $db->getAllPressure();

?>
<div class="page__title container">
    <h1>Pressure | Admin</h1>
</div>

<main class="main__wrapper">

    <div class="form__wrapper">

        <form action="" id="form_send">
            <h3>Add data</h3>
            <!-- <div class="input__group">
                    <label for="date">Дата измерений</label>
                    <input type="date" name="date" id="date">
                </div> -->

            <div class="input__group">
                <label for="pressure1">Pressure</label>
                <input type="number" name="pressure1" id="">
            </div>

            <div class="input__group">
                <label for="pressure2">Pressure</label>
                <input type="number" name="pressure2" id="">
            </div>

            <div class="input__group">
                <label for="pulse">Pulse</label>
                <input type="number" name="pulse" id="">
            </div>


            <button class="btn btn__submit" type="submit">Send</button>
        </form>

        <form action="" id="form__delete">
            <h3>Delete data</h3>
            <div class="input__group">
                <label for="curr_id">ID записи</label>
                <input type="number" name="curr_id" id="">
            </div>

            <button class="btn btn__submit" type="submit">Delete</button>
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


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/footer.php");
?>