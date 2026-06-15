<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    
    <h1>Отправка данных на сервер</h1>
    <h2>Отправка данных в строке запроса</h2>
    <hr>
    <h2>Информация полученная из строки запроса</h2>
    
    <?php
        echo "<pre>";
        print_r($_GET['educations']);        
    ?>

</body>
</html>