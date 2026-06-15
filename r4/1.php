<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

    <?php
echo "<table border='1' cellpadding='5' style='border-collapse: collapse; text-align: center;'>";
echo "<tr><th>a</th><th>b</th><th>c</th><th>q (Результат)</th></tr>";

// Перебираем все возможные комбинации (0 и 1) для a, b, c
for ($a = 0; $a <= 1; $a++) {
    for ($b = 0; $b <= 1; $b++) {
        for ($c = 0; $c <= 1; $c++) {
            
            // Логика if-elseif-else согласно таблице истинности
            if ($a == 0 && $b == 0 && $c == 1) {
                $q = 1;
            } elseif ($a == 0 && $b == 1 && $c == 0) {
                $q = 1;
            } elseif ($a == 1 && $b == 0 && $c == 0) {
                $q = 1;
            } elseif ($a == 1 && $b == 1 && $c == 1) {
                $q = 1;
            } else {
                $q = 0;
            }

            // Вывод строки таблицы
            echo "<tr>
                    <td>$a</td>
                    <td>$b</td>
                    <td>$c</td>
                    <td><b>$q</b></td>
                  </tr>";
        }
    }
}
echo "</table>";
?>



	
</body>
</html>	