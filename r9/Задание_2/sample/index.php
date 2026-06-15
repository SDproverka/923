<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Отправка данных в строке запроса</h2>
	
	<?php
		// ссылки с GET-параметрами
		// ссылки указывают на файл условного сервера server.php

		// ссылка 1
		echo "<a href='server.php/?user=timaty&topic=1&lesson=4'>Ссылка 1</a><p>";

		// ссылка 2
		echo "<a href='server.php/?user=tommy&topic=2&lesson=1'>Ссылка 2</a><p>";
		
		// ссылка 3
		echo "<a href='server.php/?user=tommy&topic=3&lesson=1'>Ссылка 3</a><p>";
	?>
	

</body>
</html>