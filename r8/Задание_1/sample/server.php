<?php
// Проверяем, что скрипт вызван именно как обработчик формы (метод POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['loader'])) {
    die("Доступ запрещен. Скрипт должен запускаться только как обработчик формы.");
}

// Принимаем текстовые данные из массива $_POST
$name    = htmlspecialchars($_POST['name'] ?? '');
$alias   = htmlspecialchars($_POST['alias'] ?? '');
$country = htmlspecialchars($_POST['country'] ?? '');
$date    = htmlspecialchars($_POST['date'] ?? '');
$style   = htmlspecialchars($_POST['style'] ?? '');
$content = htmlspecialchars($_POST['content'] ?? '');

// Проверяем, был ли выбран файл изображения
$fileSelected = isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработчик формы</title>
</head>
<body>

    <h1>Скрипт-обработчик формы</h1>
    <h2>На сервере приняты данные формы</h2>
    <p><strong>Название группы:</strong> <?= $name ?></p>
    <p><strong>Алиасное имя:</strong> <?= $alias ?></p>
    <p><strong>Страна:</strong> <?= $country ?></p>
    <p><strong>Дата основания:</strong> <?= $date ?></p>
    <p><strong>Стиль:</strong> <?= $style ?></p>
    <p><strong>Контент:</strong> <?= nl2br($content) ?></p>

    <?php if ($fileSelected): ?>
        <?php
        $file = $_FILES['image'];
        $fileName    = $file['name'];
        $fileSize    = $file['size'];
        $fileType    = $file['type'];
        $fileTmpName = $file['tmp_name'];
        $fileError   = $file['error'];

        // Перемещаем файл в директорию images/
        if ($fileError === UPLOAD_ERR_OK) {
            $targetDir = __DIR__ . '/images/';
            
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            
            $targetFile = $targetDir . basename($fileName);
            move_uploaded_file($fileTmpName, $targetFile);
        }
        ?>
        
        <h2>Пользователь пытается загрузить файл</h2>
        <p><strong>Имя файла:</strong> <?= htmlspecialchars($fileName) ?></p>
        <p><strong>Размер файла:</strong> <?= $fileSize ?> байт.</p>
        <p><strong>Тип содержимого файла:</strong> <?= htmlspecialchars($fileType) ?></p>
        <p><strong>Имя временного файла:</strong> <?= htmlspecialchars($fileTmpName) ?></p>
        <p><strong>Код ошибки:</strong> <?= $fileError ?></p>
    <?php endif; ?>

</body>
</html>
