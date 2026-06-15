<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php

include 'albums.php';

$albumsWithIds = array_map(function($item) {
    static $idCounter = 1; 
    
    if (!isset($item['id'])) {
        $item['id'] = $idCounter;
    }
    
    $idCounter++;
    return $item;
}, $albums);

echo "<pre>";
print_r($albumsWithIds);
echo "</pre>";

?>
</body>
</html>