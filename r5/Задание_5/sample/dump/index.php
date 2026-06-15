<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    <h1>Функции</h1>
    <h2>Встроенные функции, часть 2</h2>
    <?php
        require "teams.php";
        require "albums.php";
        require "tracks.php";
        
        if (isset($_GET['search']) && $_GET['search'] != '') {
            $parts = explode('::', $_GET['search']);
            
            if (count($parts) == 2) {
                $entity = $parts[0];  
                $id = $parts[1]; 
                
                if ($entity == 'teams') {
                    $data = $content;  
                    $title = "Группа";
                } elseif ($entity == 'albums') {
                    $data = $content;  
                    $title = "Альбом";
                } elseif ($entity == 'tracks') {
                    $data = $content;  
                    $title = "Трек";
                } else {
                    echo "<p>Ошибка: неизвестная сущность '$entity'</p>";
                    $data = [];
                }
                
                $found = false;
                foreach ($data as $item) {
                    if ($item['id'] == $id) {
                        echo "<h3>$title (id=$id)</h3>";
                        echo "<pre>";
                        print_r($item);
                        echo "</pre>";
                        $found = true;
                        break;
                    }
                }
                
                if (!$found) {
                    echo "<p>Запись с id=$id не найдена в $entity</p>";
                }
                
            } else {
                echo "<p>Ошибка: неверный формат. Используйте entity::id</p>";
            }
            
        } else {
            echo "<p>?search=teams::3</p>";
        }
    ?>
    
</body>
</html>