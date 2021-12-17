<?php

$auto = ['Peugeot','Mercedes','BMW','Lada','Toyota','KIA',];

$peugeot = ['206','307','207','Partner','Boxer'];
$mercedes = ['Benz','Gelandewagen','CLS','1983 190E Cosworth','1963 600 Pullman'];
$bmw = ['x6','x5','3-Series Gran Turismo ','x4','z4'];
$lada = ['Granta','Kalina','Priora','Vesta','X-Ray'];
$toyota = ['Camry','Corolla','Yaris','Prius','Highlander'];
$kia = ['Rio','Corolla','Progres','Supra','Auris'];

$countries = ['Китай','Россия','Испания','Италия','Германия','США'];
# Объём двигателя - случайное от 1 до 2
#rand(1,3)
$fuel = ['Газ','Бензин','Электричество','Солярка'];
$color = ['Красный','Синий','Чёрный','Жёлтый','Зелёный'];
# Разгон - случайное от 3 до 15
#rand(1.1,2.0)

# Генерация набора данных
for ($i = 0; $i < 5000; $i++) {

    # Генерация марки автомобиля
    $auto_mark = $auto[rand(0, count($auto)-1)];

    # Настраиваем соответствие марки и модели
    # (чтобы не получить, например ладу камри:))


    # Генерация характеристик
    $auto_datas = [
        'Country' => $countries[rand(0,count($countries)-1)],
        'Engine_capacity' => rand(1,3),
        'Fuel' => $fuel[rand(0, count($fuel)-1)],
        'Color' => $color[rand(0, count($color)-1)],
        'Acceleration to 100 km-h' => rand(1,15)
    ];


}
