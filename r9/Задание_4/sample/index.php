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
		// подключаем массив с альбомами группы
		require "albums.php";
		
		// id - идентификатор альбома, информацию о котором необходимо передать	
		// можно задать в коде 
		$id = 2;
		
		// можно передать GET-параметром (закомментировано, как в исходном файле)
		// $id = $_GET["id"];

		// объявим массив для сбора информации
		$album = array();
		
		// запускаем цикл по массиву
		foreach ($albums as $item){
			if ($item["id"] == $id) {
				
				// собираем все поля альбома в строки вида ключ=значение
				$album[] = "id={$item['id']}";
				$album[] = "album_name=" . urlencode($item['album_name']);
				$album[] = "date=" . urlencode($item['date']);
				
				// лейблы, форматы и статусы — это массивы, преобразуем их в строку через запятую
				$album[] = "label=" . urlencode(implode(", ", $item['label']));
				$album[] = "format=" . urlencode(implode(", ", $item['format']));
				$album[] = "status=" . urlencode(implode(", ", $item['status']));
			}
		}
		
		// преобразуем массив в строку с разделителем &
		$query_string = implode("&", $album);
		
		// выводим ссылку с GET-параметрами
		echo '<a href="server.php?' . $query_string . '">Перейти на сервер с данными об альбоме (ID = ' . $id . ')</a>';
	?>
	

</body>
</html>