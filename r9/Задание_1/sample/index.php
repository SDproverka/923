<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>

<h1>Отправка данных на сервер</h1>
<h2>Отправка данных в строке запроса</h2>

<?php
    $array = [
        [
            "id" => "1",
            "album_name" => "Atom Heart Mother",
            "date" => "10 октября 1970",
            "label" => "EMI, Harvest, Capitol",
            "status" => "Золотой (USA)"
        ],
        [
            "id" => "2",
            "album_name" => "Meddle",
            "date" => "30 октября 1971",
            "label" => "EMI, Harvest, Capitol",
            "status" => "Платиновый (USA)"
        ]
    ];

    echo "<h2>Исходный массив</h2>";
    echo "<pre>";
    print_r($array);
    echo "</pre>";

    // Ручное преобразование массива в строку запроса (как должно быть в ?data=...)
    // Так как в задании сказано "вручную", мы явно пишем готовую строку
    $manual_query_string = "data[0][id]=1&data[0][album_name]=Atom+Heart+Mother&data[0][date]=10+октября+1970&data[0][label]=EMI,+Harvest,+Capitol&data[0][status]=Золотой+(USA)&data[1][id]=2&data[1][album_name]=Meddle&data[1][date]=30+октября+1971&data[1][label]=EMI,+Harvest,+Capitol&data[1][status]=Платиновый+(USA)";

    // Имитируем, что эта строка пришла в $_GET
    parse_str($manual_query_string, $_GET);

    echo "<h2>Массив из строки запроса</h2>";
    echo "<pre>";
    print_r($_GET["data"]);
    echo "</pre>";
?>

</body>
</html>