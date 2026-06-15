<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 12 — Вложенные списки</title>
</head>
<body>

    <h1>Дискография групп</h1>

    <?php
    require 'albums.php';
    require 'tracks.php';

    echo "<ol>";

    foreach ($albums as $album) {
        echo "<li><strong>{$album['title']}</strong> ({$album['country']})";
        
        echo "<ul>";
        
        foreach ($tracks as $track) {
            if ($track['id_album'] == $album['id_album']) {
                echo "<li>{$track['name']}</li>";
            }
        }
        
        echo "</ul>";
        echo "</li>";
    }

    echo "</ol>";
    ?>

</body>
</html>
