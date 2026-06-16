<?php
// 1. Создаём переменную, содержащую текст файла
$text = file_get_contents('text.txt');

// 2. Заменяем символы переноса строк на HTML-тег <br>
$text = preg_replace('/\r?\n/', '<br>', $text);

// 3. Заменяем символы "#" на " - "
$text = str_replace('#', ' - ', $text); // или через preg_replace: $text = preg_replace('/#/', ' - ', $text);

echo $text;
?>