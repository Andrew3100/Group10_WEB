<?php

if ($_COOKIE['user'] == '') {
    $user = 'Гость.'.'<a href="auth_form.php"> По этой ссылке можно авторизоваться</a>';
    $exit = '';
}
else {
    $user = $_COOKIE['user'];
    $exit = "<p style='text-align: center; margin-top: 20px;'><a href='exit.php'>Нажмите для выхода</a></p>";
}

echo "<p style='text-align: center; margin-top: 120px;'>Добро пожаловать в систему, $user</p>";
echo $exit;
