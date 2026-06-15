<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

    
    <?php
require 'albums.php';
require 'tracks.php';

$target_id = isset($_GET['id']) ? $_GET['id'] : null;

foreach ($albums as $album) {
    if ($target_id === null || $album['id_album'] == $target_id) {
        echo "<strong>{$album['title']} ({$album['country']})</strong>";
        echo "<ul>";

        foreach ($tracks as $track) {
            if ($track['id_album'] == $album['id_album']) {
                echo "<li>{$track['name']}</li>";
            }
        }

        echo "</ul>";
        
        if ($target_id !== null) {
            $found = true;
        }
    }
}

if ($target_id !== null && !isset($found)) {
    echo "Альбом не найден.";
}
?>



	
</body>
</html>	