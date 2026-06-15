<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	
	<?php
		// подключаем файл с массивом заказа
		include "orders.php";
		
		// блок вывода скрытых полей заказа
		$order_fields = "";
		foreach ($orders as $item) {
			$json = json_encode($item, JSON_UNESCAPED_UNICODE);
			$order_fields .= "<input type='hidden' name='order[]' value='$json'><p>";
		}
	?>
	
	<form action="server.php" method="post">
		Фамилия: <input type="text" name="surname"><p>
		Имя: <input type="text" name="name"><p>
		E-mail: <input type="email" name="email"><p>
		
		<?php echo $order_fields; ?>
		
		<input type="submit">
	</form>

</body>
</html>s