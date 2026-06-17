<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>
	<hr>
	<h2>Загрузка файлов</h2>

	<?php
		$_ERROR = [];

		// проверяем, не превышен ли общий размер POST-данных
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST) && empty($_FILES)) {
			$_ERROR[] = "Размер загружаемого файла превышает максимально допустимый (лимит сервера - 8 МБ)";
		}

		// если поле логина непустое
		if (!empty($_POST['login'])) {
			
			// очищаем данные 	
			$login = htmlspecialchars(trim($_POST['login']));
	        
	        // проверяем данные на валидность
	        if (!preg_match('/^[a-z0-9]{5,10}$/u', $login)) {
				$_ERROR[] = "Логин $login невалиден";
	        } 
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// проверяем загрузку на наличие ошибок (только если файл был загружен)
		if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] != UPLOAD_ERR_NO_FILE) {
			
			if ($_FILES['myfile']["error"] != UPLOAD_ERR_OK) {
			   // если при загрузке произошла ошибка, запомним информацию о ней
				switch ($_FILES['myfile']['error']) {
			        case UPLOAD_ERR_INI_SIZE:
			            $_ERROR[] = "Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini (код ошибки: 1)";
						break;
			        case UPLOAD_ERR_FORM_SIZE:
			        	$_ERROR[] = "Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме (код ошибки: 2)";
						break;
			        case UPLOAD_ERR_PARTIAL:
			            $_ERROR[] = "Загружаемый файл был получен только частично (код ошибки: 3)";
						break;
			        case UPLOAD_ERR_NO_FILE:
			        	$_ERROR[] = "Файл не был загружен (код ошибки: 4)";
						break;
					default:
						$_ERROR[] = "Неизвестная ошибка при загрузке файла";
				}
			}
		} elseif (isset($_POST['load'])) {
			$_ERROR[] = "Файл не был загружен";
		}

		// если массив ошибок пуст проверяем, относится ли файл к разрешенным для загрузки
		if (empty($_ERROR) && isset($_FILES['myfile']) && $_FILES['myfile']['error'] === UPLOAD_ERR_OK){
			// разрешенные MIME-типы файлов для загрузки (по заданию)
			$allowedMimeTypes = ['image/jpeg', 'application/pdf', 'application/zip'];
			
			// получаем MIME-тип файла
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mimeType = finfo_file($finfo, $_FILES["myfile"]["tmp_name"]);
			finfo_close($finfo);
			
			// проверка, действительно ли отправляемый файл относится к разрешенным типам
			if (!in_array($mimeType, $allowedMimeTypes)) {
				$_ERROR[] = "Загружаемый файл не относится к разрешенным типам. Разрешены: JPEG, PDF, ZIP";
			}			
		}
		
		// если массив ошибок пуст пытаемся переместить файл в директорию upload
		if (empty($_ERROR) && isset($_FILES['myfile']) && $_FILES['myfile']['error'] === UPLOAD_ERR_OK) {
			
			// создаем директорию upload, если её нет
			$uploadDir = __DIR__ . '/upload/';
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0777, true);
			}
			
			// текущее расположение файла
			$current_path = $_FILES['myfile']['tmp_name'];

			// оригинальное имя файла
			$filename = $_FILES['myfile']['name'];
			
			// очищаем имя файла от опасных символов
			$filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename);
			
			// генерируем уникальное имя файла, чтобы не перезаписывать существующие
			$fileinfo = pathinfo($filename);
			$newFilename = time() . '_' . $fileinfo['basename'];

			// место постоянного хранения файла
			$new_path = $uploadDir . $newFilename;				

			// перемещение загруженного файла 
			if (move_uploaded_file($current_path, $new_path)) {

				// выводим сообщение об успешной загрузке файла
				echo "<h3 style='color: green;'>✅ Файл успешно загружен на сервер</h3>";
				echo "<p><strong>Логин:</strong> " . htmlspecialchars($login) . "</p>";
				echo "<p><strong>Имя файла:</strong> " . htmlspecialchars($filename) . "</p>";
				echo "<p><strong>Сохранён как:</strong> " . htmlspecialchars($newFilename) . "</p>";
				echo "<p><strong>MIME-тип:</strong> " . htmlspecialchars($mimeType) . "</p>";
				echo "<p><strong>Размер:</strong> " . round($_FILES['myfile']['size'] / 1024 / 1024, 2) . " МБ</p>";
				
				// если это изображение - показываем его
				if (strpos($mimeType, 'image/') === 0) {
					echo "<img src='upload/" . htmlspecialchars($newFilename) . "' width='250px' alt='Загруженное изображение'>";
				} elseif ($mimeType === 'application/pdf') {
					echo "<p><a href='upload/" . htmlspecialchars($newFilename) . "' target='_blank'>📄 Открыть PDF-файл</a></p>";
				} elseif ($mimeType === 'application/zip') {
					echo "<p><a href='upload/" . htmlspecialchars($newFilename) . "'>📦 Скачать ZIP-архив</a></p>";
				}

			} else {
				// если во время перемещения возникла ошибка
				echo "<h3 style='color: red;'>❌ Не удалось переместить файл в директорию хранения</h3>";
			}	

		} elseif (!empty($_ERROR)) {
			// выводим массив ошибок
			echo "<h3 style='color: red;'>❌ Ошибки:</h3>";
			echo "<pre>";
			print_r($_ERROR);
			echo "</pre>";
		} else {
			echo "<p>Выберите файл для загрузки</p>";
		}
	?>

</body>
</html>