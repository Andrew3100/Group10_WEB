<?php
// база
require_once 'C:\xampp\htdocs\cko\db\connect.php';

set_time_limit(0); # снимаем ограничение времени выполнения скрипта

for ($i = 0; $i < 2000000; $i++) {
    $rand = rand(1000,1000000);
    $fio = 'Andre_'.$rand;
    # continue - прерывает шаг цикла
    $mail = 'Andre_'.$rand.'@mail.ru';
    $country = rand(1,6);
    $insert = $mysqli->query("INSERT INTO users (`fio`,`mail`,`birth`,`country_id`,`town_id`) 
                                    VALUES ('$fio','$mail',0,1,'$country')");
    # break; # прерывание цикла
}


exit();
# Получение данных со стороны клиента
$data = $_REQUEST['term'];

$time = time();
echo $sql = "INSERT INTO journal_search (`timestamp`, `symbol`) VALUES ('$time','$data')";
$insert = $mysqli->query($sql);

// текст запроса
$sql = "SELECT mail,twn.name as town, cnt.name as country, fio FROM users usr
INNER JOIN towns twn ON twn.id = usr.town_id
INNER JOIN countries cnt ON cnt.id = usr.country_id
WHERE fio LIKE '%$data%'
";

$result = $mysqli->query($sql);


$arr = array();
while ($res = mysqli_fetch_assoc($result)) {
    $mail = $res['mail'];
    $fio = $res['fio'];
    $country = $res['country'];
    $town = $res['town'];
    # состав массива
    # label -
    $arr[] = array('data'=> $town/*Попадает в форму ввода*/,
        'value'=>$country/*Попадает в поле подсказки*/);
}
exit();
echo json_encode($arr);