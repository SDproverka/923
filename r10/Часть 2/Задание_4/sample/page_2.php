<?php
// Сессия для передачи данных между страницами
session_start();

// Сохраняем данные со страницы 1, если они были отправлены
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['surname'] = $_POST['surname'] ?? '';
    $_SESSION['firstname'] = $_POST['firstname'] ?? '';
    $_SESSION['patronymic'] = $_POST['patronymic'] ?? '';
}

// Если нет данных с первой страницы, перенаправляем обратно
if (empty($_SESSION['surname']) && empty($_SESSION['firstname'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    
    <h1>Отправка данных на сервер</h1>
    <h2>Еще о формах</h2>
    <hr>
    <h2>Регистрация. Страница 2</h2>

    <form action="page_3.php" method="post">
        Должность: <input type="text" name="post"><p>
        Категория: <input type="text" name="category"><p>
        Стаж: <input type="text" name="experience"><p>    
        
        <input type="submit" value="Далее">
    </form>

</body>
</html>