<?php

// Для подключения к базе данных необходимо иметь данные для доступа к ней. Для подключения через PHP необходим следующий набор данных
// Адрес сервера
$db_host = 'localhost';
// Имя пользователя
$db_user = 'root';
// Пароль пользователя
$db_password = '';
// Имя базы данных
$db_base = 'lessons';

// Для осуществления подключения необходимо создать экземпляр нового подключения и передать в него параметры
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

// Для проверки успешности подключения необходимо проверить его при помощи метода connect_error
if ($mysqli->connect_error) {
    echo "Ошибка подключения к базе данных";
}
