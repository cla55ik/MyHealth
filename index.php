<?php
$page_title = 'My Health Main page';
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/header.php");

?>



<main class="main__wrapper main__page">
    <?php 
        require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/sidebar.php');
    ?>
    <div class="main__page_content">

    </div>
</main>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script> -->


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/footer.php");
?>