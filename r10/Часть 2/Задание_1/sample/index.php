<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	<hr>
	<h2>Оформление заказа</h2>
	
	<?php
		// подключаем файл с заказом
		require "order.php";
	?>
	
	<form action="server.php" method="post">
		Фамилия: <input type="text" name="surname"><p>
		Имя: <input type="text" name="name"><p>
		E-mail: <input type="email" name="email"><p>
		
		<input type="hidden" name="product" value="<?php echo $order['product']; ?>">
		<input type="hidden" name="height" value="<?php echo $order['height']; ?>">
		<input type="hidden" name="material" value="<?php echo $order['material']; ?>">
		<input type="hidden" name="structure" value="<?php echo $order['structure']; ?>">
		<input type="hidden" name="collection" value="<?php echo $order['collection']; ?>">
		
		<input type="submit">
	</form>

</body>
</html>s