<?php
# Подключение базы данных из отдельного файла
include 'db.php';
$delete_id = $_GET['delete_record'];
$mysqli->query("UPDATE `test`.`users` SET `ban` = 1 WHERE (`id` = '$delete_id')");
echo "<script>window.location.replace('user_list.php')</script>";
