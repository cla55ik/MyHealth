<?php
$page_title = 'My Pressure';
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/header.php");
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/dbController.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/db_config.php');



$dbconf = new dbConnect;
$dbconn = $dbconf->getDbConfig();

$db = new dbController($dbconn);

$data_arr = $db->getAllPressure();

?>

<div class="page__title container">
    <h1>pressure measurement results</h1>
</div>

<main class="main__wrapper">
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/sidebar.php');
    ?>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script> -->


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/footer.php");
?>