<?php

include 'db.php';

echo '
<div class="container-fluid" style="margin-top: 120px;">
<div class="row">
<div class="col">
';
echo '<h3 style="text-align: center">Форма авторизации пользователя</h3><br>';
echo '
<div class="container">
<div class="row">
<div class="col">

</div>
<div class="col">
<form>
    <label for="login" class="form-label">Введите логин</label>
    <input id="login" class="form-control" type="text" style="width: 400px;" placeholder="Логин"><br>
    <label for="pass">Введите пароль</label>
    <input id="pass" type="password" class="form-control" style="width: 400px;" placeholder="Пароль"><br>
    <div class="row">
        <div class="col">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">Запомнить меня</label>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Войти!</button>
        </div>
    </div>
</form>
</div>
<div class="col">

</div>
</div>


</div>

';
echo '
<div>
<div>
<div>
';