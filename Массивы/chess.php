<?php

echo '<table border="1" style="margin: auto">';
$sym = ['A','B','C','D','E','F','G','H'];

$rand_i = rand(1,8);
$rand_k = rand(1,8);

for ($i = 1; $i <= 8; $i++) {
    echo '<tr>';

    if ($i%2==0) {
        // Фиксируем в переменной тот факт, что обрабатывается чётная строка
        $line = 'even';
    }
    else {
        $line = 'odd';
    }

    for ($k = 1; $k <= 8; $k++) {
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
        echo "<td style='background-color: $color; width: 80px; height: 80px;'>$ladya_photo</td>";
    }
    echo '</tr>';
}
echo '</table>';

echo '<pre>';
var_dump($coordinates_row);
echo '</pre>';
