<?php
# Подключение базы данных из отдельного файла
include 'db.php';


# Идентификатор обновляемой записи
$update_record = $_GET['edit_record'];
if ($_POST != []) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $sql = "UPDATE `test`.`users` SET `name` = '$name',`surname` = '$surname',`email` = '$email'  WHERE (`id` = '$update_record')";
    $update = $mysqli->query($sql);
    echo "<script>window.location.replace('user_list.php')</script>";
    exit();
}

# Получаем данные о нужной записи из базы данных
$sql = "SELECT * FROM users WHERE id = '$update_record'";
$select = $mysqli->query($sql);

while ($sel = mysqli_fetch_assoc($select)) {
    $id = $sel['id'];
    $name = $sel['name'];
    $surname = $sel['surname'];
    $email = $sel['email'];
    $date_create_account = $sel['date_create'];
}
var_dump($_POST);
echo "
<div style='margin-top: 120px; '>
<form method='post' style='width: 350px; margin: auto'>
    <label for='name' class='form-label'>Имя</label>
    <input  class='form-control' name='name' id='name' value='$name'>
    
    <label for='surname' class='form-label'>Фамилия</label>
    <input  class='form-control' name='surname' id='surname' value='$surname'>
    
    <label for='email' class='form-label'>Почта</label>
    <input  class='form-control' name='email' id='email' value='$email'>
    <br>
    <button class='btn btn-success' type='submit'>Обновить запись</button>
</form>
</div>
";

