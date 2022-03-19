<?php
# Подключение библиотеки для работы с Excel
include 'Classes/PHPExcel.php';

#echo '<pre>';
#var_dump($_FILES);
#echo '</pre>';

# Преобразование Excel-файла для обработки на PHP
$excel = PHPExcel_IOFactory::load($_FILES['excel']['tmp_name']);

# Счётчик строк
$i = 2;

while ($value = $excel->getActiveSheet()->getCell('A'.$i)->getValue()!="") {
    echo $excel->getActiveSheet()->getCell('A'.$i)->getValue().'<br>';
    $i++;
}

