<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>	
	<h2>Отправка данных в строке запроса</h2>
	<hr>
	<h2>Информация полученная из строки запроса</h2>
	
	<?php
		// информация строки запроса
		// данные приходят через $_GET, так как метод GET
		$id = isset($_GET['id']) ? $_GET['id'] : 'не указан';
		$album_name = isset($_GET['album_name']) ? $_GET['album_name'] : 'не указано';
		$date = isset($_GET['date']) ? $_GET['date'] : 'не указана';
		$label = isset($_GET['label']) ? $_GET['label'] : 'не указан';
		$format = isset($_GET['format']) ? $_GET['format'] : 'не указан';
		$status = isset($_GET['status']) ? $_GET['status'] : 'не указан';
		
		// выводим в читаемом виде, как в примере задания
		echo "<p><strong>Идентификатор альбома:</strong> $id</p>";
		echo "<p><strong>Название альбома:</strong> $album_name</p>";
		echo "<p><strong>Дата выпуска:</strong> $date</p>";
		echo "<p><strong>Лейбл студии:</strong> $label</p>";
		echo "<p><strong>Формат:</strong> $format</p>";
		echo "<p><strong>Статус:</strong> $status</p>";
	?>
	

</body>
</html>