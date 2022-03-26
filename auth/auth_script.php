<?php

include "db.php";

$login = $_POST['login'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM users WHERE login = '$login' AND pass_md5 = '$password'";
$check_user = $mysqli->query($sql);

//var_dump(mysqli_fetch_assoc($check_user));

// Если число найденных записей равно 0, то выводим предупреждение
if ($check_user->num_rows == 0) {
    echo '<script>alert(`Пользователь с такими данными не зарегистрирован`)</script>';
    echo "<script>window.location.replace('auth_form.php');</script>";
    //обязательно останавливаем скрипт
    exit();
}
# ФИО пользователя
$user_data = '';
while ($check = mysqli_fetch_assoc($check_user)) {
    $user_data .= $check['firstname'].' ';
    $user_data .= $check['name'].' ';
    $user_data .= $check['lastname'];
}


// Описание параметров:

// 'user' - общее название куки файлов
// второй параметр означает, что создаются куки файлы на данного пользователя
// time() + 3600*24 - время окончания жизни куки файлов (в данном случае это сутки, начиная с момента создания куков)
// '/' - означает, что куки будут работать на всех страницах данного расположения
// time() + 3600*24 - создаём куки файлы на сутки, НАЧИНАЯ с текущего момента времени

if (setcookie('user',$user_data,time() + 3600*24, "/")) {
    echo '<script>alert(`Добро пожаловать в систему! Нажмите ОК для продолжения`)</script>';
    echo "<script>window.location.replace('index1.php');</script>";
    //обязательно останавливаем скрипт
    exit();
}





