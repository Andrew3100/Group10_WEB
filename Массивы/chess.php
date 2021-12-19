<?php

echo '<table border="1">';
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
        echo "<td style='background-color: $color; width: 80px; height: 80px;'></td>";
    }
    echo '</tr>';
}
echo '</table>';