<?php

$rand_ladya_x = rand(1,8);
$rand_ladya_y = rand(1,8);
$rand_ladya_coord = $rand_ladya_x.'_'.$rand_ladya_y;

$rand_peshka_1 = $rand_ladya_x;
$rand_peshka_2 = $rand_ladya_x;
$rand_peshka_3 = $rand_ladya_x;

// Цикл проверяет, чтобы пешки не наложились на ладью
while ($rand_peshka_1 == $rand_ladya_coord OR $rand_peshka_2 == $rand_ladya_coord OR $rand_peshka_3 == $rand_ladya_coord) {
    $rand_peshka_1 = rand(1,8).'_'.rand(1,8);
    $rand_peshka_2 = rand(1,8).'_'.rand(1,8);
    $rand_peshka_3 = rand(1,8).'_'.rand(1,8);
}


for ($i = 1; $i <= 8; $i++) {

    // Данное условие необходимо для проверки битой клетки по строке
    if ($i == $rand_ladya_x) {
        $attack = 1;
    }
    else {
        $attack = 0;
    }

    // Данное условие необходимо для определения цвета клетки
    if ($i%2==0) {
        // Фиксируем в переменной тот факт, что обрабатывается чётная строка
        $line = 'even';
    }
    else {
        $line = 'odd';
    }

    for ($k = 1; $k <= 8; $k++) {

        // Условие проверяет, какую строку обрабатываем, в зависимости от этого даём клетке тот или иной цвет
        if ($line == 'even') {
            if ($k % 2 != 0 ) {
                $color = 'black';
            }
            else {
                $color = 'white';
            }
        }
        else {
            if ($k % 2 == 0 ) {
                $color = 'black';
            }
            else {
                $color = 'white';
            }
        }

        // Условие  проверяет битую клетку по столбцу
        if ($k == $rand_ladya_y) {
            $attack1 = 1;
        }
        else {
            $attack1 = 0;
        }


        // Соединяем текущие координаты, чтобы сравнить их со случайными координатами клеток
        $fix_figure = $i.'_'.$k;
        // Если соединённые координаты равны координатам либо первой, либо второй, либо третьей пешки
        if ($fix_figure == $rand_peshka_1 OR $fix_figure == $rand_peshka_2 OR $fix_figure == $rand_peshka_3) {
            // то в $figure пишем наличие фигуры
            $figure = 'peshka';
        }
        else {
            // Фиксируем ладью в клетке
            if ($fix_figure == $rand_ladya_coord) {
                $figure = 'ladya';
            }
            else {
                // Если нет, то пустое значение
                $figure = NULL;
            }

        }

        // Ключ - координата клетки. Значение - массив, в котором элементы
        // $attack - клетка под атакой ладьи или нет. 0_0 - клетка не тронута, 0_1 или 1_0 - клетка битая. 1_1 - там ладья
        // $figure - если 1, то в этой клетке стоит пешка, 0 - клетка пустая
        // $color  - цвет клетки
        $attack3 = $attack.'_'.$attack1;
        if ($attack3 == '0_1' OR $attack3 == '1_0') {
            $attack_full = 1;
        }
        else {
            $attack_full = 0;
        }
        $data[$i.'_'.$k] = [
            $figure,
            $attack_full,
            $color
        ];
    }
    $data_full[] = $data;
    unset($data);

}







echo '<table border="1" style="margin: auto">';


for ($i = 0; $i < count($data_full); $i++) {
    echo '<tr>';
    for ($k = 0; $k < count($data_full[$i]); $k++) {


        $cell_figure = $data_full[$i][($i+1).'_'.($k+1)][0];
        $cell_attack = $data_full[$i][($i+1).'_'.($k+1)][1];
        $cell_color = $data_full[$i][($i+1).'_'.($k+1)][2];


        if ($cell_attack == 1 AND $cell_figure == 'peshka') {
            $cell_color_real = 'red';

        }
        else {
            $cell_color_real = $cell_color;
        }

        // Вставка фигуры
        if ($cell_figure == 'ladya') {
            $cell_figure = '<p style="text-align: center"><img src="ladya.png" style="width: 25px; height: 40px;"></p>';
        }
        else {
            if ($cell_figure == 'peshka') {
                $cell_figure = '<p style="text-align: center"><img src="peshka.png" style="width: 25px; height: 40px;"></p>';
        }
            else {
                $cell_figure = '';
            }
        }

        echo "<td style='background-color: $cell_color_real; height: 50px; width: 50px;'>$cell_figure</td>";

    }

    echo '</tr>';
}
echo '</table>';
