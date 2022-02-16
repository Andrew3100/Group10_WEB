<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
</head>
<body>


<!-- Дополнительный JavaScript; выберите один из двух! -->

<!-- Вариант 1: Bootstrap в связке с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Вариант 2: Bootstrap JS отдельно от Popper
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>


<?php

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

if ($mysqli->connect_error) {
    echo "Ошибка подключения к базе данных";
}


$sql = "SELECT * FROM users";
$select = $mysqli->query($sql);

echo '<table style="width: 800px; margin: auto; margin-top: 120px;" class="table table-dark table-striped table-hover">';
echo "
<tr>
<td>Идентификатор</td>
<td>Имя</td>
<td>Фамилия</td>
<td>Почта</td>
<td>Дата создания аккаунта</td>
</tr>
";
while ($sel = mysqli_fetch_assoc($select)) {
    $id = $sel['id'];
    $name = $sel['name'];
    $surname = $sel['surname'];
    $email = $sel['email'];
    $date_create_account = $sel['date_create'];
    echo "
    <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$surname</td>
        <td>$email</td>
        <td>$date_create_account</td>
    </tr>
    ";


}
echo '</table>';



?>