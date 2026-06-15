<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 13 — Вывод альбома</title>
</head>
<body>

    <?php
    require 'albums.php';
    require 'tracks.php';

echo "<h3>Выберите альбом:</h3>";
echo "<ul>";
foreach ($albums as $album) {
    echo "<li><a href='?id={$album['id_album']}'>{$album['title']}</a></li>";
}
echo "</ul>";

echo "<hr>"; 

if (isset($_GET['id'])) {
    $target_id = $_GET['id'];
    $found = false;

    foreach ($albums as $album) {
        if ($album['id_album'] == $target_id) {
            echo "<h3>" . $album['title'] . " (" . $album['country'] . ")</h3>";
            echo "<ul>";

            foreach ($tracks as $track) {
                if ($track['id_album'] == $album['id_album']) {
                    echo "<li>" . $track['name'] . "</li>";
                }
            }
            
            echo "</ul>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<p>Альбом не найден.</p>";
    }
}
    ?>

</body>
</html>
