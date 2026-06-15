<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработчик формы</title>
</head>
<body>

<h2>## Обработчик формы</h2>

<p>Сервер получил следующие данные</p>

<?php
// Проверяем, были ли данные отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из формы с проверкой на существование
    // Используем htmlspecialchars для безопасного вывода
    $lastname = isset($_POST['lastname']) ? htmlspecialchars(trim($_POST['lastname'])) : '';
    $firstname = isset($_POST['firstname']) ? htmlspecialchars(trim($_POST['firstname'])) : '';
    $patronymic = isset($_POST['patronymic']) ? htmlspecialchars(trim($_POST['patronymic'])) : '';
    $position = isset($_POST['position']) ? htmlspecialchars(trim($_POST['position'])) : '';
    $education = isset($_POST['education']) ? htmlspecialchars(trim($_POST['education'])) : '';
    $category = isset($_POST['category']) ? htmlspecialchars(trim($_POST['category'])) : '';
    $total_experience = isset($_POST['total_experience']) ? htmlspecialchars(trim($_POST['total_experience'])) : '';
    $college_experience = isset($_POST['college_experience']) ? htmlspecialchars(trim($_POST['college_experience'])) : '';

    // Выводим данные в формате, указанном в задании
    echo "<p>Фамилия: $lastname</p>";
    echo "<p>Имя: $firstname</p>";
    echo "<p>Отчество: $patronymic</p>";
    echo "<p>Должность: $position</p>";
    echo "<p>Уровень образования: $education</p>";
    echo "<p>Категория: $category</p>";
    echo "<p>Общий стаж: $total_experience</p>";
    echo "<p>Стаж в техникуме: $college_experience</p>";
} else {
    echo "<p>Ошибка: данные не были отправлены методом POST.</p>";
}
?>

</body>
</html>