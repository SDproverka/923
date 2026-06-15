<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработчик формы</title>
</head>
<body>

<h2>## Обработчик формы</h2>

<?php
// Проверяем, были ли данные отправлены методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Получаем имя пользователя
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    
    // Формируем массив только с критериями поиска (brand, os, ssd)
    $searchCriteria = [];
    
    if (isset($_POST['brand']) && !empty($_POST['brand'])) {
        $searchCriteria['brand'] = $_POST['brand'];
    }
    
    if (isset($_POST['os']) && !empty($_POST['os'])) {
        $searchCriteria['os'] = $_POST['os'];
    }
    
    if (isset($_POST['ssd']) && !empty($_POST['ssd'])) {
        $searchCriteria['ssd'] = $_POST['ssd'];
    }
    
    // Преобразуем массив критериев в JSON-строку
    $jsonString = json_encode($searchCriteria, JSON_UNESCAPED_UNICODE);
    
    // Кодируем JSON-строку для использования в URL (строка запроса)
    $encodedJson = urlencode($jsonString);
    
    // Выводим приветствие
    if (!empty($name)) {
        echo "<p>Здравствуйте, $name!</p>";
    }
    ?>
    
    <p>Мы сформировали список ваших предпочтений и готовы начать поиск!</p>
    
    <center>
        <a href="db.php?data=<?php echo $encodedJson; ?>">Начать поиск</a>
    </center>
    
    <?php
} else {
    echo "<p>Ошибка: данные не были отправлены методом POST. Пожалуйста, вернитесь в <a href='index.php'>форму</a>.</p>";
}
?>

</body>
</html>