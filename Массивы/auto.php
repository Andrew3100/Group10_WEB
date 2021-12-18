<?php

$auto = ['Peugeot','Mercedes','BMW','Lada','Toyota','KIA'];

$peugeot = ['206','307','207','Partner','Boxer'];
$mercedes = ['Benz','Gelandewagen','CLS','1983 190E Cosworth','1963 600 Pullman'];
$bmw = ['x6','x5','3-Series Gran Turismo ','x4','z4'];
$lada = ['Granta','Kalina','Priora','Vesta','X-Ray'];
$toyota = ['Camry','Corolla','Yaris','Prius','Highlander'];
$kia = ['Rio','Picanto','Ceed','Stinger','K900'];


$countries = ['Китай','Россия','Испания','Италия','Германия','США'];

# Объём двигателя - случайное от 1 до 2

# Топливо
$fuel = ['Газ','Бензин','Электричество','Солярка'];
# Цвет
$color = ['Красный','Синий','Чёрный','Жёлтый','Зелёный'];

# Разгон - случайное от 3 до 15
#rand(3, 15)


# Генерация набора данных
for ($i = 0; $i < 5000; $i++) {

    # Генерация марки автомобиля
    $auto_mark = $auto[rand(0, count($auto)-1)];

    # Настраиваем соответствие марки и модели
    # (чтобы не получить, например ладу камри:))
    if ($auto_mark == 'Peugeot') {
        $mark = $peugeot;
    }
    if ($auto_mark == 'Mercedes') {
        $mark = $mercedes;
    }
    if ($auto_mark == 'BMW') {
        $mark = $bmw;
    }
    if ($auto_mark == 'Lada') {
        $mark = $lada;
    }
    if ($auto_mark == 'Toyota') {
        $mark = $toyota;
    }
    if ($auto_mark == 'KIA') {
        $mark = $kia;
    }

    # Присоединяем к марке случайное значение модели
    $auto_mark_model = $auto_mark.'-'.$mark[rand(0, count($mark)-1)];

    # Генерация характеристик
    $auto_datas = [
        'Country' => $countries[rand(0,count($countries)-1)],
        'Engine_capacity' => rand(1,3),
        'Fuel' => $fuel[rand(0, count($fuel)-1)],
        'Color' => $color[rand(0, count($color)-1)],
        'Acceleration to 100 km-h' => rand(3,15)
    ];
    # Главный массив данных. Ключом записываем переменную $auto_mark_model, а значением - характеристики
    $automobiles_data_full[$auto_mark_model] = $auto_datas;
}
echo '<pre>';
var_dump($automobiles_data_full);
echo '</pre>';



// Если форма не отправлена, то показываем её
if (!isset($_GET['fuel'])) {
    echo '<form method="get">';
    echo '
<label for="country">Страна</label>
<input type="text" name="country" id="country">
<br>
<label for="engine">Двигатель</label>
<input type="text" name="engine" id="engine">
<br>
<label for="fuel">Топливо</label>
<input type="text" name="fuel" id="fuel">
<br>
<label for="color">Цвет</label>
<input type="text" name="color" id="color">
<br>
<label for="speed100">Разгон до 100</label>
<input type="text" name="speed100" id="speed100">
<br><button type="submit">Узнать</button>
</form>
<br>
';
}
//echo '<pre>';
//var_dump($automobiles_data_full);
//echo '</pre>';
# Поиск данных

# Разбиваем массивы для удобства их использования. Первый - марки авто. Второй - характеристики
$autos = array_keys($automobiles_data_full);
$charact = array_values($automobiles_data_full);


$country  = $_GET['country'];
$engine   = $_GET['engine'];
$fuel     = $_GET['fuel'];
$color    = $_GET['color'];
$speed100 = $_GET['speed100'];


for ($i = 0; $i < count($charact); $i++) {
    for ($k = 0; $k < count($charact[$i]); $k++) {
        // Ищем нужные характеристики. Должно попасться либо топливо, либо разгон
        if (array_keys($charact[$i])[$k] == 'Fuel' OR array_keys($charact[$i])[$k] == 'Acceleration to 100 km-h') {
            // Проверяем газ
            if (($charact[$i])['Fuel'] == $fuel AND ($charact[$i])['Acceleration to 100 km-h'] < $speed100) {
               $result[$autos[$i]] = $charact[$i];
            }
        }
    }
}


echo '<pre>';
var_dump($result);
echo '</pre>';

