<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    
    <h1>Отправка данных на сервер</h1>
    <h2>Отправка данных в строке запроса</h2>
        
    <?php
        // исходный двумерный массив
        $educations = array (
            array (
            'id' => 5, 
            'institution' => 'Московский государственный институт электронной техники (технический университет) ', 
            'qualification' => 'Факультет инфокоммуникационных технологий', 
            'specialty' => 'Программное обеспечение радиоэлектронных систем', 
            'year_receipts' => 2005, 
            'year_release' => 2010, 
            'note' => ''
            ),
            array (
            'id' => 12, 
            'institution' => 'Санкт-Петербургский государственный университет (СПбГУ)', 
            'qualification' => 'Информационные системы и технологии', 
            'specialty' => 'Безопасность киберфизических систем', 
            'year_receipts' => 1993, 
            'year_release' => 1998, 
            'note' => ''        
            )
        );

        // формирование строки запроса вручную
        $query_parts = [];
        foreach ($educations as $index => $edu) {
            foreach ($edu as $key => $value) {
                $query_parts[] = "educations[{$index}][{$key}]=" . urlencode($value);
            }
        }
        $query_string = implode('&', $query_parts);
        
        // ссылка для передачи данных на сервер
        echo "<a href='server.php?{$query_string}'>Передать данные об образовании</a>";
    ?>

</body>
</html>