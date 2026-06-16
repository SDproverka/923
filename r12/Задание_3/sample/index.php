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
        // массив для поиска совпадений с шаблоном
        $array = array(
            "PostgreSQL. Мастерство разработки", 
            "Сборник рецептов MySQL",
            "Чертоги разума. Убей в себе идиота!",            
            "Рефакторинг sql-приложений", 
            "Python в веб приложениях", 
            "SQL. Полное руководство"
        );
        
        // Регулярное выражение для поиска книг с упоминанием SQL
        // \b - граница слова, i - регистронезависимый режим
        $pattern = '/\b(?:SQL|sql|MySQL)\b/i';
        
        // Фильтрация массива: оставляем только те книги, где есть упоминание SQL
        $filtered = array_filter($array, function($book) use ($pattern) {
            return preg_match($pattern, $book);
        });
        
        // Вывод результата в виде списка
        echo "<ol>\n";
        foreach ($filtered as $book) {
            echo "<li>$book</li>\n";
        }
        echo "</ol>";
    ?>
    
</body>
</html>