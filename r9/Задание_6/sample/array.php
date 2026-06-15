<?php

    $assoc_array = [ 
		"name" => "Мастер и Маргарита",
		"author" => "М.Булгаков",
		"year" => 1940,
		"genre" => "Мистика",
		"bestseller" => true
	];
	
	$json_string = '{"name":"Мастер и Маргарита","author":"М.Булгаков","year":1940,"genre":"Мистика","bestseller":true}';
	
	$decoded_array = json_decode($json_string, true);
	
	echo "<pre>";
	print_r($decoded_array);
	echo "</pre>";
?>