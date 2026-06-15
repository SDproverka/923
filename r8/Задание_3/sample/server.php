<?php
// Проверяем, что скрипт вызван кнопкой отправки формы
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['loader'])) {
    die("Доступ запрещен. Скрипт должен запускаться только как обработчик формы.");
}

// Принимаем текстовые данные и очищаем их от опасных тегов
$surname    = htmlspecialchars($_POST['surname'] ?? '');
$name       = htmlspecialchars($_POST['name'] ?? '');
$patronymic = htmlspecialchars($_POST['patronymic'] ?? '');
$post       = htmlspecialchars($_POST['post'] ?? '');
$category   = htmlspecialchars($_POST['category'] ?? '');
$experience = htmlspecialchars($_POST['experience_college'] ?? '0');

// Имя картинки по умолчанию (картинка-плейсхолдер)
$avatarUrl = 'images/placeholder.jpg'; 

// Проверяем, было ли загружено изображение пользователя без ошибок
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = 'images/';
    
    // Создаем папку images, если её нет
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    // Сохраняем оригинальное имя файла
    $fileName = basename($_FILES['image']['name']);
    $targetFile = $targetDir . $fileName;
    
    // Перемещаем изображение из временной папки
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $avatarUrl = $targetFile; // Если загрузка успешна, выводим его
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о сотруднике</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        .profile-card { border: 1px solid #ccc; padding: 20px; max-width: 500px; display: flex; gap: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .avatar img { width: 150px; height: 200px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
        .info h2 { margin-top: 0; color: #333; }
        .info p { margin: 5px 0; color: #555; }
    </style>
</head>
<body>

    <h1>Скрипт-обработчик формы</h1>
    <hr>

    <div class="profile-card">
        <div class="avatar">
            <!-- Вывод изображения (пользовательского или плейсхолдера) -->
            <img src="<?= $avatarUrl ?>" alt="Фото сотрудника">
        </div>
        <div class="info">
            <h2><?= $surname ?> <?= $name ?> <?= $patronymic ?></h2>
            <p><strong>Должность:</strong> <?= $post ?></p>
            <p><strong>Категория:</strong> <?= $category ?></p>
            <p><strong>Стаж в техникуме:</strong> <?= $experience ?> лет</p>
        </div>
    </div>

</body>
</html>
