<?php

// Адрес сервера
$db_host = 'localhost';
// Имя пользователя
$db_user = 'root';
// Пароль пользователя
$db_password = 'root';
// Имя базы данных
$db_base = 'cko';


// Для осуществления подключения необходимо создать экземпляр нового подключения и передать в него параметры
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

if ($mysqli->connect_error) {
    echo "Ошибка подключения к базе данных";
}