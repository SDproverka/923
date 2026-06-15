<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

    
    <?php
// Массив из раздаточного материала
$team = array(
  array('id_team' => '1','name' => 'Aerosmith','country' => 'США','date' => '1970','style' => 'хард-рок'),
  array('id_team' => '2','name' => 'Pink Floyd','country' => 'Великобритания','date' => '1965','style' => 'психоделический-рок'),
  array('id_team' => '3','name' => 'The Beatles','country' => 'Великобритания','date' => '1960','style' => 'рок-н-ролл'),
  array('id_team' => '4','name' => 'AC/DC','country' => 'Австралия','date' => '1973','style' => 'хард-блюз-рок'),
  array('id_team' => '5','name' => 'Scorpions','country' => 'ФРГ','date' => '1965','style' => 'хард-рок'),
  array('id_team' => '6','name' => 'Ленинград','country' => 'Россия','date' => '1997','style' => 'ска, фолк, панк')
);

// Цикл для вывода данных в заданном формате
foreach ($team as $item) {
    echo "Группа: " . $item['name'] . " (id = " . $item['id_team'] . ")<br/>";
    echo "Страна: " . $item['country'] . "<br />";
    echo "Дата основания: " . $item['date'] . "<br />";
    echo "Стиль: " . $item['style'] . "<br />";
    echo "<hr/>";
    echo "<p>"; // Открывающий тег p согласно формату в задании
}
?>


	
</body>
</html>	