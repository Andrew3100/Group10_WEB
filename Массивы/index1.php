<?php

// Создаём массив с информацией о столах в формате номерстолика_размерсчёта_дата

for ($i = 0; $i < 364; $i++) {
    # Номер стола
    $table_number = rand(1,30);
    # Размер счёта
    $cash         = rand(500, 2000).'$';
    $day = rand(1,30);
    $month = rand(1,12);
    # Если выбран месяц от 1 до 9
    if (strlen($month) == 1) {
        $month = '0'.$month;
    }
    $date = $day.':'.$month.':'.'21';
    $rest_info[] = $table_number.'_'.$cash.'_'.$date;
}


// Разбиваем наши случайные данные на три массива. Массивы сопоставлены по индексам.
// То есть, все нулевые индексы всех массивов можно считать единой записью о столике
for ($i = 0; $i < count($rest_info); $i++) {
    $table = explode('_',$rest_info[$i]);
    $table_number_info[] = $table[0];
    $table_cash[] = $table[1];
    $table_cash_date[] = $table[2];
}
//echo '<pre>';
//var_dump($table_number_info);
//echo '</pre>';
//echo '<pre>';
//var_dump($table_cash);
//echo '</pre>';
//echo '<pre>';
//var_dump($table_cash_date);
//echo '</pre>';

for ($i = 0; $i < count($table_number_info); $i++) {
    $current_table = $table_number_info[$i];
    $sum_by_table = 0;
    for ($k = 0; $k < count($table_number_info); $k++) {
        if ($table_number_info[$k] == $current_table) {
           $sum_by_table = $sum_by_table + $table_cash[$k];
        }
    }
    $full_info[$current_table] = $sum_by_table;
    unset($sum_by_table);
}

echo '<pre>';
var_dump($full_info);
echo '</pre>';
