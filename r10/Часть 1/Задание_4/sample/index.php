<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>	
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Отправка форм</h2>
	
	<?php
		/* 
		загружая форму, не забудьте передать GET-параметр view ...
	
		
		?view=dump  -> отобразим данные формы объектом PHP
		?view=json  -> отобразим данные формы объектом JSON
		*/

		$view = isset($_GET['view']) ? $_GET['view'] : 'dump';
	?>

	<form action="server.php?view=<?php echo $view; ?>" method="post">
		Название: <input type="text" name="name"><p>
		Алиас: <input type="text" name="alias"><p>
		Страна: <input type="text" name="country"><p>
		Год основания: <input type="text" name="date"><p>
		Стиль: <input type="text" name="style"><p>
		Изображение: <input type="text" name="path"><p>
		Контент: <textarea name="content"></textarea><p>
		Примечание: <input type="text" name="note"><p>

		<input type="submit">
	</form>s


</body>
</html>