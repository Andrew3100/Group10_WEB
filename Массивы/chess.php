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


$j = 0;
for ($i = 1; $i <= 8; $i++) {
    if ($i == $rand_ladya_x) {
        $attack = 1;
    }
    else {
        $attack = 0;
    }
    for ($k = 1; $k <= 8; $k++) {

        if ($i == $rand_ladya_y) {
            $attack1 = 1;
        }
        else {
            $attack1 = 0;
        }


        // Соединяем текущие координаты, чтобы сравнить их со случайными координатами клеток
        $fix_figure = $k.'_'.$i;
        // Если соединённые координаты равны координатам либо первой, либо второй, либо третьей пешки
        if ($fix_figure == $rand_peshka_1 OR $fix_figure == $rand_peshka_2 OR $fix_figure == $rand_peshka_3) {
            // то в $figure пишем наличие фигуры
            $figure = 'Тут расположена пешка';
        }
        else {
            // Если нет, то пустое значение
            $figure = NULL;
        }

        // Ключ - координата клетки. Значение - массив, в котором элементы
        // $attack - клетка под атакой ладьи или нет
        // $figure - если 1, то в этой клетке стоит пешка, 0 - клетка пустая
        // $color  - цвет клетки
        $attack3 = $attack.'_'.$attack1;
        $data[$i.'_'.$k] = [
                $figure,
                $attack3,
        ];
    }
}
echo '<pre>';
var_dump($data);
echo '</pre>';
exit();


//echo '<pre>';
//var_dump($data);
//echo '</pre>';
//
//
//
//









echo '<table border="1" style="margin: auto">';
$sym = ['A','B','C','D','E','F','G','H'];

$rand_i = 2/*rand(1,8)*/;
$rand_k = 2/*rand(1,8)*/;

for ($i = 1; $i <= 8; $i++) {
    echo '<tr>';
    if ($i == $rand_i) {
        $attack = 1;
    }
    else {
        $attack = 0;
    }
    if ($i%2==0) {
        // Фиксируем в переменной тот факт, что обрабатывается чётная строка
        $line = 'even';
    }
    else {
        $line = 'odd';
    }

    for ($k = 1; $k <= 8; $k++) {
        if ($k == $rand_k) {
            $attack1 = 1;
        }
        else {
            $attack1 = 0;
        }
        $coordinates_row[] = $i.'_'.$k;
        // Если строка чётная
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
        if ($i == $rand_i AND $k == $rand_k) {
            $ladya_photo = '<img style="width: 20px; height: 50px;margin: 0px auto 0px; display: block;" src="ladya.png">';
        }
        else {
            $ladya_photo = '';
        }
        $attack3 = $attack.'_'.$attack1;
        echo "<td style='background-color: $color; width: 80px; height: 80px;'>$ladya_photo $attack3</td>";

    }
    echo '</tr>';
}
echo '</table>';

echo '<pre>';
var_dump($coordinates_row);
echo '</pre>';
