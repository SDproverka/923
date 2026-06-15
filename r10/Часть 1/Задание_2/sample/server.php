<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Обработчик формы</h1>
	<h2>Сервер получил следующие данные</h2>

	<h2>JSON строка</h2>

	<?php
		// получаем данные из формы
		$data = [
			"name" => $_POST['name'],
			"alias" => $_POST['alias'],
			"country" => $_POST['country'],
			"date" => $_POST['date'],
			"style" => $_POST['style'],
			"path" => $_POST['path'],
			"content" => $_POST['content'],
			"note" => $_POST['note']
		];

		// преобразуем в JSON вручную
		$json_string = '{';
		$json_string .= '"name" : "' . addslashes($data['name']) . '", ';
		$json_string .= '"alias" : "' . addslashes($data['alias']) . '", ';
		$json_string .= '"country" : "' . addslashes($data['country']) . '", ';
		$json_string .= '"date" : "' . addslashes($data['date']) . '", ';
		$json_string .= '"style" : "' . addslashes($data['style']) . '", ';
		$json_string .= '"path" : "' . addslashes($data['path']) . '", ';
		$json_string .= '"content" : "' . addslashes($data['content']) . '", ';
		$json_string .= '"note" : "' . addslashes($data['note']) . '"';
		$json_string .= '}';

		echo $json_string;

		echo "<h2>PHP массив</h2>";

		// декодируем JSON обратно в массив
		$decoded_array = json_decode($json_string, true);

		echo "<pre>";
		print_r($decoded_array);
		echo "</pre>";
	?>

</body>
</html>