<?php

$surname  = $_GET['surname'];
$name     = $_GET['name'];
$sub_name = $_GET['sub_name'];
$birthday = $_GET['birthday'];
$mail = $_GET['mail'];
$color = $_GET['color'];
$address = $_GET['address'];
$tel = $_GET['tel'];
$about = $_GET['about'];

echo "
<h3>Фамилия: $surname</h3>
<h3>Имя: $name</h3>
<h3>Отчество: $sub_name</h3>
<h3>Дата рождения: $birthday</h3>
<h3>Электронная почта: $mail</h3>
<h3>Любимый цвет: $color</h3>
<h3>Адрес проживания: $address</h3>
<h3>Номер телефона: $tel</h3>
<h3>О себе: </h3>
<h5>$about</h5>
";