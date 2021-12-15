<?php
# Сформировали массив из десяти имён
$names = array('Андрей','Сергей','Олег','Татьяна','Александр','Александра','Евгений','Иван','Алексей','Пётр');

for ($i = 0; $i < 9999; $i++) {
    $name = $names[rand(0,9)];
    # Рандомный ник игрока, используемый в качестве ключа
    $name = $name.'_'.rand(0,9999);
    # Массив данных
    $key_value[$name] = rand(5000 ,10000);
}

echo '<table border="1">';
echo '<tr>';
echo '<td>Имя игрока</td>';
echo '<td>Итоговый счёт</td>';
echo '</tr>';
for ($i = 0; $i < count(array_values($key_value)); $i++) {
    $name = array_keys($key_value)[$i];
    $score = array_values($key_value)[$i];
    echo '<tr>';
    echo "<td>$name</td>";
    echo "<td>$score</td>";
    echo '</tr>';
}
echo '</table>';
