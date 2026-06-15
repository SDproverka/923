<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на server</h1>
	<h2>Загрузка файлов</h2>
	<hr>
	<h2>Скрипт-обработчик формы</h2>

	<?php
		// 1. Проверяем, что скрипт вызван кнопкой из формы
		if (isset($_POST["loader"])) {
			
			// 2. Проверяем загрузку на базовое отсутствие ошибок
			if ($_FILES['myfile']["error"] == UPLOAD_ERR_OK) {

				// Генерируем случайное уникальное имя для файла
				$filename = md5(uniqid());
				
				// Выделяем расширение файла с помощью стандартной функции
				$ext = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);

				// Временный файл на сервере
				$current_path = $_FILES["myfile"]["tmp_name"];
				
				// ИСПОЛЬЗУЕМ СТРОГО ОТНОСИТЕЛЬНЫЙ ПУТЬ БЕЗ __DIR__
				$target_dir = 'upload/';

				// Автоматически создаем локальную папку, если её ещё нет
				if (!is_dir($target_dir)) {
					mkdir($target_dir, 0777, true);
				}
				
				// Формируем финальное имя файла для сохранения
				$new_path = $target_dir . $filename . "." . $ext;

				// Перемещаем файл в относительную директорию
				if (move_uploaded_file($current_path, $new_path)) {
					echo "<h3>Файл успешно загружен на сервер</h3>";
				} else {
					// Если это сообщение вывелось, значит у сервера совсем нет прав создавать файлы в этой папке
					echo "<h3>К сожалению, не удалось переместить файл. Создайте папку upload вручную.</h3>";
				}      

			} else {
				// 3. Обрабатываем системные ошибки, если файл изначально не дошел до сервера
				switch ($_FILES['myfile']['error']) {
			        case UPLOAD_ERR_INI_SIZE:
			            echo "<h3>Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini (код ошибки: 1)</h3>";
						break;
			        case UPLOAD_ERR_FORM_SIZE:
			            echo "<h3>Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме (код ошибки: 2)</h3>";
						break;
			        case UPLOAD_ERR_PARTIAL:
			            echo "<h3>Загружаемый файл был получен только частично (код ошибки: 3)</h3>";
						break;
			        case UPLOAD_ERR_NO_FILE:
			        	echo "<h3>Файл не был загружен (код ошибки: 4)</h3>";
			        	break;
			        case UPLOAD_ERR_NO_TMP_DIR:
			        	echo "<h3>Отсутствует временная папка на сервере (код ошибки: 6)</h3>";
			        	break;
			        case UPLOAD_ERR_CANT_WRITE:
			        	echo "<h3>Не удалось записать файл на диск (код ошибки: 7)</h3>";
			        	break;
			        case UPLOAD_ERR_EXTENSION:
			        	echo "<h3>PHP-расширение остановило загрузку файла (код ошибки: 8)</h3>";
			        	break;
			        default: 
			        	echo "<h3>Файл по какой-то причине не загружен... :(( (Код ошибки: " . $_FILES['myfile']['error'] . ")</h3>";
				}
			}			
		} else {
			echo "<h3>Заполните, пожалуйста, форму</h3>";
		}
	?>

</body>
</html>
