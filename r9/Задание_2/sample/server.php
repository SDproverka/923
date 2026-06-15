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
        // инициализация массива
        $course = [
            [
                "Основы программирования", 
                ["Введение в PHP", "Переменные", "Константы", "Типы данных", "Строки"]
            ],        
            [
                "Функции",
                ["Встроенные функции", "Пользовательские функции", "Область видимости переменных"]
            ],
            [
                "Управляющие конструкции",
                ["Условные операторы", "Циклы", "Конструкции"]
            ]
        ];

        // вывод данных из массива $course согласно переданных параметров
        // GET-параметры: user, topic, lesson
        
        $topic = isset($_GET['topic']) ? (int)$_GET['topic'] : null;
        $lesson = isset($_GET['lesson']) ? (int)$_GET['lesson'] : null;
        
        // topic: номер темы (1, 2, 3) - соответствует индексу в массиве +1
        // lesson: номер урока в теме (1, 2, ...)
        
        if ($topic !== null && $topic >= 1 && $topic <= count($course)) {
            $topic_index = $topic - 1;
            $topic_name = $course[$topic_index][0];
            $lessons = $course[$topic_index][1];
            
            echo "<h3>Тема: $topic_name</h3>";
            echo "<ul>";
            
            if ($lesson !== null && $lesson >= 1 && $lesson <= count($lessons)) {
                // Выводим конкретный урок
                $lesson_index = $lesson - 1;
                echo "<li>" . $lessons[$lesson_index] . "</li>";
            } else {
                // Выводим все уроки темы
                foreach ($lessons as $l) {
                    echo "<li>$l</li>";
                }
            }
            echo "</ul>";
        } else {
            echo "<p>Тема не найдена</p>";
        }
    ?>
    
</body>
</html>