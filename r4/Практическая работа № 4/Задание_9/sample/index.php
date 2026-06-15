<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Управляющие конструкции</h1>
	<h2>Конструкции</h2>
	<hr>
	<h2>Включения файлов</h2>
	
	<?php
	
		for($i=1; $i<=5; $i++) { 
			// вариант 1 
			include "$i.txt"; 
			echo "<br />"; 
}
			echo" ";

		for($i=1; $i<=5; $i++) { 
			// вариант 2 
			require "$i.txt"; 
			echo "<br />"; 
}
	?>
	

</body>
</html>