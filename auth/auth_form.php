<?php
// Тут бутстрап
include "bootstrap.html";
if ($_COOKIE['user'] != '') {
    echo "<script>window.location.replace('index.php');</script>";
}
?>

<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col text-center">
            <h4 style="color: olive">Форма авторизации на сайте</h4>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="auth_script.php" method="post">
                <label for="login" class="form-label">Введите логин</label>
                <input id="login" class="form-control" name="login" type="text" style="width: 400px;" placeholder="Логин"><br>
                <label for="pass">Введите пароль</label>
                <input id="pass" type="password" name="password" class="form-control" style="width: 400px;" placeholder="Пароль"><br>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Войти!</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-warning" href="new_account.php">У меня ещё нет аккаунта!</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>


</div>
