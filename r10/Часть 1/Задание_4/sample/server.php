<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Обработчик формы</h1>
	<h2>Сервер получил следующие данные</h2>

	<?php
		$view = isset($_GET['view']) ? $_GET['view'] : 'dump';
		
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
		
		if ($view == 'json') {
			echo "<h2>JSON строка</h2>";
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
		} else {
			echo "<h2>PHP массив</h2>";
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}
	?>s

</body>
</html>