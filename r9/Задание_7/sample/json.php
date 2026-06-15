<?php
	/* 
	
	неверное json-представление ассоциативного массива PHP
	- найдите ошибки
	- исправьте
	- декодируйте
	- выведите в браузер
	
	*/
	
	// Исправленный JSON:
	// 1. Вместо одинарных кавычек - двойные
	// 2. Вместо точки с запятой между элементами - запятые
	// 3. year - число (без кавычек)
	// 4. bestseller - булево значение true (без кавычек)
	$json = '{
		"name" : "Harry Potter and the Goblet of Fire",
		"author" : "J. K. Rowling",
		"year" : 2000,
		"genre" : "Fantasy Fiction",
		"bestseller" : true
	}';
	
	$decoded_array = json_decode($json, true);
	
	echo "<pre>";
	print_r($decoded_array);
	echo "</pre>";
?>