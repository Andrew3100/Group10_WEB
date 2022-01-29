<?php

// Для подключения к базе данных необходимо иметь данные для доступа к ней. Для подключения через PHP необходим следующий набор данных

// Адрес сервера
$db_host = 'localhost';
// Имя пользователя
$db_user = 'root';
// Пароль пользователя
$db_password = '';
// Имя базы данных
$db_base = 'test';

// Для осуществления подключения необходимо создать экземпляр нового подключения и передать в него параметры
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

// Для проверки успешности подключения необходимо проверить его при помощи метода connect_error
if ($mysqli->connect_error) {
    echo "Ошибка подключения к базе данных";
}

// Метод query позволяет передать SQL запрос на выполнение
$time_create = time();

# $mysqli->query("INSERT INTO `test`.`users` (`name`, `surname`, `email`, `date_create`) VALUES ('Иван', 'Петров', 'ivan@mail.ru', '$time_create')");

$mysqli->query("UPDATE `test`.`users` SET `email` = 'ivan@' WHERE (`id` = '1')");

$select = $mysqli->query("SELECT * FROM users");

while ($s = mysqli_fetch_assoc($select)) {
    echo $s['surname'];
    echo '<br>';
}

