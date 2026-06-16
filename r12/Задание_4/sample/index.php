<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    <h1>Отправка данных на сервер</h1>
    <h2>Регулярные выражения, часть 1</h2>
    
    <?php
        // входная строка
        $list = <<< HERE
            <ul>
            <li>PostgreSQL. Мастерство разработки</li> 
            <li>Сборник рецептов MySQL</li>
            <li>Чертоги разума. Убей в себе идиота!</li>            
            <li>Рефакторинг sql-приложений</li>
            <li>Python в веб приложениях</li>
            <li>SQL. Полное руководство</li>
            </ul>
        HERE;

        // вывод исходной входной строки
        echo "<h3>Исходный список:</h3>";
        echo $list;
        
        // Регулярное выражение для извлечения текста из тегов <li>
        preg_match_all('/<li>(.*?)<\/li>/', $list, $matches);
        
        // Получаем массив названий книг
        $books = $matches[1];
        
        // Регулярное выражение для поиска книг с упоминанием SQL
        $pattern = '/\b(?:SQL|sql|MySQL|PostgreSQL)\b/i';
        
        // Фильтрация: оставляем только книги с упоминанием SQL
        $filtered = array_filter($books, function($book) use ($pattern) {
            return preg_match($pattern, $book);
        });
        
        // Вывод отобранных элементов в виде нумерованного списка
        echo "<h3>Отфильтрованные книги (с упоминанием SQL):</h3>";
        echo "<ol>\n";
        foreach ($filtered as $book) {
            echo "<li>$book</li>\n";
        }
        echo "</ol>";
    ?>
    
</body>
</html>