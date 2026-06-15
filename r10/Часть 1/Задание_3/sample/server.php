<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработчик формы</title>
</head>
<body>

<h2>## Обработчик формы</h2>

<p>Сервер получил следующие данные</p>

<h2>## JSON строка</h2>

<?php
// Проверяем, были ли данные отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Создаем массив для хранения данных формы
    $formData = [];
    
    // Используем цикл foreach для преобразования данных формы в массив
    foreach ($_POST as $key => $value) {
        // Обрабатываем каждый элемент: удаляем лишние пробелы, экранируем спецсимволы
        $formData[$key] = trim($value);
    }
    
    // Преобразуем массив в JSON-строку (с опцией JSON_UNESCAPED_UNICODE для кириллицы)
    $jsonString = json_encode($formData, JSON_UNESCAPED_UNICODE);
    
    // Выводим JSON-строку
    echo "<p>$jsonString</p>";
    
    echo "<h2>## PHP массив</h2>";
    
    // Декодируем JSON-строку обратно в массив PHP
    $decodedArray = json_decode($jsonString, true);
    
    // Выводим массив в удобочитаемом формате
    echo "<pre>";
    print_r($decodedArray);
    echo "</pre>";
    
} else {
    echo "<p>Ошибка: данные не были отправлены методом POST.</p>";
}
?>

</body>
</html>