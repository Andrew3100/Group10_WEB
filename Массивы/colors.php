<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>


<!-- Необязательный JavaScript; выберите один из двух! -->

<!-- Вариант 1: пакет Bootstrap с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!-- Вариант 2: отдельные JS для Popper и Bootstrap -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->
</body>
</html>
<?php
# Массив цветов
$colors = ['GreenYellow','SeaGreen','Aqua','IndianRed','Pink',
           'LightSalmon','Thistle','OrangeRed','Orange','Gold',
           'Lavender','SeaGreen','DarkOrchid','Cornsilk','Chocolate',
           'Gray','Silver','Fuchsia','Maroon','Olive',
           'Black','DarkOliveGreen','Teal','Navy','Blue',
            ];
$unique = array();
for ($i = 0; $i < 5; $i++) {
    for ($k = 0; $k < 5; $k++) {
        // Случайное число
        $rand = rand(0,24);
        // Цикл сделан для исключения повторений чисел в массиве
        while (in_array($rand,$unique)) {
            $rand = rand(0,24);
        }
        // Пишем число в массив уникальных для последующей проверки
        $unique[] = $rand;
        // Пишем набор элементов в массив
        $number_row[] = $rand;
    }
    //Пишем массив в массив
    $numbers[] = $number_row;
    // Удаляем набор элементов
    unset($number_row);

}


// Рисуем таблицу
echo '<div class="container" style="margin-top: 130px;">
<table class="table table-bordered">';
for ($i = 0; $i < count($numbers); $i++) {
    echo '<tr>';
    for ($k = 0; $k < count($numbers[$i]); $k++) {
        $num = $numbers[$i][$k];
        echo "<td style='background-color: $colors[$num]'>";
        echo $num;
        echo '</td>';
    }
    echo '</tr>';

}
echo '</table>';