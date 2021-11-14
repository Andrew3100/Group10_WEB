<?php

include 'Excel/Classes/PHPExcel.php';
include 'array.php';
$excel = PHPExcel_IOFactory::load('Октябрь.xlsx');

$month = 10;
$excel->setActiveSheetIndex($month-1);



$i = 7;
while ($excel->getActiveSheet()->getCell('B'.$i)->getValue()!="") {

    $student_info = new stdClass();
    $student_info->name = $excel->getActiveSheet()->getCell('B'.$i)->getValue();

    for ($g = 2; $g < count($cells); $g++) {
        $value_day[] = $excel->getActiveSheet()->getCell($cells[$g].(6))->getValue().'.'.$month;
        $value_info[] = $excel->getActiveSheet()->getCell($cells[$g].$i)->getValue();
    }
    $student_info->day = $value_day;
    $student_info->info = $value_info;

    echo '<pre>';
    var_dump($student_info);
    echo '</pre>';

    $i++;
}



