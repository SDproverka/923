
<?php

	$array = ["Мастер и Маргарита", "М.Булгаков", 1940, "Мистика", true];
	
	$json_string = '["Мастер и Маргарита","М.Булгаков",1940,"Мистика",true]';
	
	$decoded_array = json_decode($json_string, true);
	
	echo "<pre>";
	print_r($decoded_array);
	echo "</pre>";
?>
