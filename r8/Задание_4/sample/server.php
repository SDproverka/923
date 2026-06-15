<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов</title>
</head>
<body>

    <h1>Скрипт множественной загрузки</h1>
    <hr>

    <?php
    if (isset($_FILES['myfile'])) {
        $count = count($_FILES['myfile']['name']);
        $uploadedCount = 0;
        $targetDir = 'upload/';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        for ($i = 0; $i < $count; $i++) {
            if ($_FILES['myfile']['error'][$i] !== UPLOAD_ERR_NO_FILE) {
                $currentPath = $_FILES['myfile']['tmp_name'][$i];
                $originalName = basename($_FILES['myfile']['name'][$i]);
                
                // РЕШЕНИЕ ДЛЯ ОДИНАКОВЫХ ИМЕН: Генерация уникального хеша
                $ext = pathinfo($originalName, PATHINFO_EXTENSION);
                $filename = md5(uniqid() . $i) . '.' . $ext;
                
                $newPath = $targetDir . $filename;

                if (move_uploaded_file($currentPath, $newPath)) {
                    echo "<p>Файл <strong>$originalName</strong> успешно сохранен как <code>$filename</code>.</p>";
                    $uploadedCount++;
                } else {
                    echo "<p style='color: red;'>Ошибка сохранения файла $originalName. Проверьте права chmod!</p>";
                }
            }
        }

        echo "<h3>Всего успешно сохранено файлов: $uploadedCount</h3>";
    } else {
        echo "<h3>Отправьте форму</h3>";
    }
    ?>

</body>
</html>
