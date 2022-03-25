<?php
include 'bootstrap.html';
?>

<form action="new_account_script.php" method="post" style="width: 600px; margin: 120px auto auto auto">

    <label for="login" class="form-label">Фамилия</label>
    <input class="form-control" id="login" type="text" name="firstname" required>
    <br>
    <label for="login" class="form-label">Имя</label>
    <input class="form-control" id="login" type="text" name="name" required>
    <br>
    <label for="login" class="form-label">Отчество</label>
    <input class="form-control" id="login" type="text" name="lastname" required>
    <br>
    <label for="mail" class="form-label">Укажите адрес электронной почты</label>
    <input class="form-control" id="mail" type="text" name="login" required>
    <br>
    <label for="password" class="form-label">Придумайте пароль</label>
    <input class="form-control" id="password" type="password" name="password" required>
    <br>
    <label for="password1" class="form-label">Уточните пароль</label>
    <input class="form-control" id="password1" type="password" name="password1" required>
    <br>
    <button type="submit" class="btn btn-primary">Создать учётную запись</button>
    <br>
    <br>
    <a class="btn btn-warning" href="auth_form.php">У меня уже есть аккаунт</a>

</form>
