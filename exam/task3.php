<?php

// Возьмите большой абзац любого текста (3-4 предложения). Применив функцию explode
// разбейте его на отдельные слова. Учитывайте, что слова могут разделяться
// не только пробелами.

$text = "I play outside. I like to play. I read a book. I like to read books. I walk home. I do not like walking home. My mother cooks soup for dinner. The soup is hot. Then, I go to bed. I do not like to go to bed.";

echo '<pre>';
($array = explode(' ',$text));
echo '</pre>';
foreach ($array as $key => $value) {

        if (strpos($value,'.') > 0) {
            $new_str = str_replace('.','',$value);
            $array[$key] = $new_str;
        }
        if (strpos($value,':') > 0) {
            $new_str = str_replace(':','',$value);
            $array[$key] = $new_str;
        }
        if (strpos($value,',') > 0) {
            $new_str = str_replace(',','',$value);
            $array[$key] = $new_str;
        }
        if ($value == '–') {
            unset($array[$key]);
        }

}

foreach ($array as $key => $value) {
    $sub_str = str_split($value);
    $glas = ['a','A','o','O','e','E','i','I','u','U','y','Y'];
    $count_glas = 0;
    foreach ($glas as $key1 => $value1) {
        if (in_array($value1,$sub_str)) {
            # число гласных букв
            $count_glas++;
        }
    }
    # число согласных букв
    $count_soglas = strlen($value) - $count_glas;
    $data = ['согласных' => $count_soglas,'гласных' => $count_glas];
    $data_full[$value] = $data;
    unset($data);
}

echo '<pre>';
var_dump($data_full);
echo '</pre>';



//Возьмите абзац текста. Разбейте его на слова (по принципу предыдущей задачи)
//   посчитайте число гласных и согласных в каждому слове. Создайте массив
//   ключ-значение, ключ которого - это самое слово, а значение - массив,
//   в котором два элемента - число согласных и гласных букв. Ниже показан пример массива
//   {
//   'слово' =>
//                {
//                'гласных' => 2,
//                'согласных' => 3
//                }
//   }