<?php
//  Подключаем файл с массивом
require "album.php";


function fnOutAlbum($arr) {
 
    $out = "<table border='1' cellpadding='5' cellspacing='0'>";
    $out .= "<tr>";
    $out .= "<th>ID</th>";
    $out .= "<th>Альбом</th>";
    $out .= "<th>Дата выпуска</th>";
    $out .= "<th>Страна</th>";
    $out .= "</tr>";
    
   
    foreach ($arr as $item) {
        $out .= "<tr>";
        $out .= "<td>{$item['id_album']}</td>";
        $out .= "<td>{$item['title']}</td>";
        $out .= "<td>{$item['date']}</td>";
        $out .= "<td>{$item['country']}</td>";
        $out .= "</tr>";
    }
    
    $out .= "</table>";
    
    // Возвращаем сформированную строку
    return $out;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список альбомов</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Список альбомов</h1>

    <?php
    //Выводим альбомы из массива album
    echo fnOutAlbum($album);
    ?>

</body>
</html>