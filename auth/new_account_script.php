<?php
include "db.php";

// данные из формы
$firstname = $_POST['firstname'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$login = $_POST['login'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

// Для того, чтобы пользователи не повторялись,необходимо убедиться, что такой логин не создавался ранее
// Для этого собираем записи из базы с таким логином
// Считается, что пользователей нет, когда записей нет

$check = $mysqli->query("SELECT * FROM users WHERE login = '{$login}'");
if ($check->num_rows > 0) {
    // Если записей больше 0, выводим предупреждение что такая учётка уже есть
    echo "<script>alert('Внимание! Аккаунт с такой электронной почтой уже существует!')</script>";
    // Затем отправляем обратно на создание регистрации
    echo "<script>window.location.replace('new_account.php');</script>";
    //обязательно останавливаем скрипт
    exit('Выход в случае созданного аккаунта');
}


// Перед вставкой записи необходимо проверить пароли на совпадение
if ($password != $password1) {

    // Если не совпадают, выводим предупреждение
    echo "<script>alert('Внимание! Пароли не совпадают! Повторите попытку')</script>";
    // Затем отправляем обратно на создание регистрации
    echo "<script>window.location.replace('new_account.php');</script>";
    //обязательно останавливаем скрипт
    exit('Выход в случае разных паролей');
}
else {

    # exit('Выход');
    // Если длина пароля меньше 8, то делаем тоже, что и пр разных паролях
    if (strlen($password1) < 8) {
        echo "<script>alert('Внимание! Пароль слишком короткий! Повторите попытку')</script>";
        // Затем отправляем обратно на создание регистрации
        echo "<script>window.location.replace('new_account.php');</script>";
        //обязательно останавливаем скрипт
        exit('Выход в случае слишком короткого пароля');
    }
    else {
        // Создаём шифр пароля при помощи функции md5
        $password = md5($password);

        // Если мы оказались в этой ветке, то пароли совпадают и длина пароля нормальная
        // Можно вставлять данные в базу
        $insert = $mysqli->query("INSERT INTO `auth`.`users` 
           (`firstname`, `name`, `lastname`, `pass_md5`, `login`, `status`, `ban`) 
    VALUES 
           ('$firstname', '$name', '$lastname', '$password', '$login', 'user', '0');
");
        if ($insert) {
            echo '<script>alert(`Регистрация прошла успешно`)</script>';
            echo "<script>window.location.replace('auth_form.php');</script>";
            //обязательно останавливаем скрипт
            exit('Выход в случае успешной регистрации');

        }
    }
}



