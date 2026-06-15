<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    include 'person.php';

    if (!array_key_exists('category', $person)) {
        $person['category'] = "Соответствие занимаемой должности";
    }

    echo "<h3>Категория преподавателя:</h3>";
    echo $person['category'];

    echo "<hr>";

    echo "<h3>Полный массив (var_dump):</h3>";
    echo "<pre>";
    var_dump($person);
    echo "</pre>";
?>

</body>
</html>