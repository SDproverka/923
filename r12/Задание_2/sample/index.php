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
        // 1. Переменная с текстом файла
        $text = file_get_contents('text.txt');

        // 2. Замена переносов строк на <br>
        $text = preg_replace('/\r?\n/', '<br>', $text);

        // 3. Ручное составление массивов для замены плейсхолдеров {pictN} на изображения
        $patterns = [];
        $pictures = [];

        $patterns[] = "/{pict1}/";
        $pictures[] = "<p><img src='pictures/pict1.jpg' width='500px'></p>";

        $patterns[] = "/{pict2}/";
        $pictures[] = "<p><img src='pictures/pict2.jpg' width='500px'></p>";

        $patterns[] = "/{pict3}/";
        $pictures[] = "<p><img src='pictures/pict3.jpg' width='500px'></p>";

        $patterns[] = "/{pict4}/";
        $pictures[] = "<p><img src='pictures/pict4.jpg' width='500px'></p>";

        $patterns[] = "/{pict5}/";
        $pictures[] = "<p><img src='pictures/pict5.jpg' width='500px'></p>";

        $patterns[] = "/{pict6}/";
        $pictures[] = "<p><img src='pictures/pict6.jpg' width='500px'></p>";

        // 4. Замена плейсхолдеров на HTML-код изображений
        $text = preg_replace($patterns, $pictures, $text);

        // 5. Вывод результата в браузер
        echo $text;
    ?>
</body>
</html>