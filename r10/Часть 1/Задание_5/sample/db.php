<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Модуль поиска информации</title>
</head>
<body>

<h2>## Модуль поиска информации, согласно пришедшего критерия</h2>

<?php
// Получаем JSON-строку из параметра 'data' в URL
if (isset($_GET['data']) && !empty($_GET['data'])) {
    
    // Декодируем URL-закодированную строку
    $jsonString = urldecode($_GET['data']);
    
    // Декодируем JSON в массив PHP
    $searchCriteria = json_decode($jsonString, true);
    
    // Проверяем, успешно ли декодирован JSON
    if ($searchCriteria !== null) {
        // Выводим массив в формате var_dump (как в примере задания)
        var_dump($searchCriteria);
    } else {
        echo "<p>Ошибка: не удалось декодировать JSON-строку.</p>";
    }
    
} else {
    echo "<p>Ошибка: критерии поиска не переданы. Пожалуйста, вернитесь в <a href='index.php'>форму</a>.</p>";
}
?>

</body>
</html>