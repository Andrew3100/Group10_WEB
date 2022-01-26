<?php

include 'Excel/Classes/PHPExcel.php';
include 'array.php';

$excel = PHPExcel_IOFactory::load('absence_full.xlsx');

$month = 11;
$excel->setActiveSheetIndex($month-1);
$sheet_names = ($excel->getSheetNames());
$i = 7;
while ($excel->getActiveSheet()->getCell('B'.$i)->getValue()!="") {

    $student_info = new stdClass();
    $student_info->name = $excel->getActiveSheet()->getCell('B'.$i)->getValue();

    for ($g = 2; $g < count($cells); $g++) {

        if ($excel->getActiveSheet()->getCell($cells[$g].(5))->getOldCalculatedValue() == "Сб"
                OR
            $excel->getActiveSheet()->getCell($cells[$g].(5))->getOldCalculatedValue() == "Ср") {

            $value_day_week[] = $excel->getActiveSheet()->getCell($cells[$g].(5))->getOldCalculatedValue();
            $value_day[] = $excel->getActiveSheet()->getCell($cells[$g].(6))->getValue().'.'.$month;
            $value_info[] = $excel->getActiveSheet()->getCell($cells[$g].$i)->getValue();

        }

    }

    $student_info->day = $value_day;
    $student_info->info = $value_info;
    $student_info->day_of_week = $value_day_week;

    $count_value_day       =  count($value_day);
    $count_value_day_week  =  count($count_value_day_week);
    $count_value_info      =  count($count_value_info);

    unset($value_info);
    unset($value_day);
    unset($value_day_week);

    $students_info[] = $student_info;
    echo '<pre>';
    var_dump($students_info);
    echo '</pre>';
    $i++;
}




