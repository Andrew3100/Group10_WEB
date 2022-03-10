<?php
// Адрес сервера
$db_host = 'localhost';
// Имя пользователя
$db_user = 'root';
// Пароль пользователя
$db_password = '';
// Имя базы данных
$db_base = 'test';

// Для осуществления подключения необходимо создать экземпляр нового подключения и передать в него параметры
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

# Подключение методов для работы с Excel
include 'Classes/PHPExcel.php';
//include 'db.php';

# Новый документ Excel
$excel = new PHPExcel();

# Устанавливаем активный лист - в данном случае первый (нулевой с точки зрения массива)
$excel->setActiveSheetIndex(0);

$excel->getActiveSheet()->setCellValue('A1','Идентификатор');
$excel->getActiveSheet()->setCellValue('B1','Имя');
$excel->getActiveSheet()->setCellValue('C1','Фамилия');
$excel->getActiveSheet()->setCellValue('D1','Почта');
$excel->getActiveSheet()->setCellValue('E1','Дата создания аккаунта');

$select = $mysqli->query("SELECT * FROM users");

$i = 1;
while ($s = mysqli_fetch_assoc($select)) {
    $excel->getActiveSheet()->setCellValue('A'.$i,$s['id']);
    $excel->getActiveSheet()->setCellValue('B'.$i,$s['name']);
    $excel->getActiveSheet()->setCellValue('C'.$i,$s['surname']);
    $excel->getActiveSheet()->setCellValue('D'.$i,$s['email']);
    $excel->getActiveSheet()->setCellValue('E'.$i,$s['date_create']);
    $i++;
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="report.xlsx');
header('Cash-Control: max-age=0');
$file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$file->save('php://output');