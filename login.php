<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/access.php');
unset($_SESSION['error_admin']);

$page_title = 'Login page';
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/header.php");


if (!empty($_POST)) {

    if (isset($_POST['login']) && isset($_POST['pass'])) {
        $login = strip_tags($_POST['login']);
        $pass = strip_tags($_POST['pass']);
        if (isset(ACCESS_USER[$login]) && ACCESS_USER[$login] == $pass) {
            $_SESSION['access_admin'] = true;
            unset($_SESSION['error_admin']);
            header("Location: /admin");
        } else {
            $_SESSION['error_admin'] = true;
        }
    }
}
?>


<div class="login__wrapper">
    <div class="login__container container">
        <form class="form__login" action="login.php" method="post">
            <div class="login__title">
                <h3>Login form</h3>
            </div>
            <div class="input__group">
                <label for="login">Login</label>
                <input type="text" name="login" id="">
            </div>

            <div class="input__group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="">
            </div>


            <button class="btn btn__submit" type="submit">Sign in</button>
        </form>
    </div>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/pages/footer.php");
?>