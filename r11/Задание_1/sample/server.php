<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>

    <h1>Отправка данных на сервер</h1>
    <h2>Безопасность данных, часть 1</h2>

    <?php
        // Массив для сбора ошибок
        $errors = [];

        // Получаем данные из POST-запроса
        $login = trim($_POST['login'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pwd   = trim($_POST['pwd'] ?? '');

        // ========== 1. Проверка поля Логин ==========
        if ($login === '') {
            $errors[] = "Не заполнено поле Логин";
        } else {
            // Санитизация: преобразуем спецсимволы HTML
            $login = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
            // Валидация: только латинские буквы, цифры, знак подчёркивания и точка
            if (!preg_match('/^[a-zA-Z0-9_.]+$/', $login)) {
                $errors[] = "Логин содержит недопустимые символы";
            }
        }

        // ========== 2. Проверка поля E-mail ==========
        if ($email === '') {
            $errors[] = "Не заполнено поле E-mail";
        } else {
            // Санитизация email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            // Валидация email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "$email - невалидный адрес";
            }
        }

        // ========== 3. Проверка поля Пароль ==========
        if ($pwd === '') {
            $errors[] = "Не заполнено поле Пароль";
        } else {
            // Санитизация пароля
            $pwd = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
            // Валидация: пароль не должен быть короче 4 символов
            if (strlen($pwd) < 4) {
                $errors[] = "Пароль должен содержать не менее 4 символов";
            }
        }

        // ========== Вывод результата ==========
        if (empty($errors)) {
            echo '<p style="color: green; font-weight: bold;">Форма успешно отправлена!</p>';
        } else {
            echo '<p style="color: red;">Обнаружены ошибки:</p>';
            echo '<pre>';
            var_dump($errors);
            echo '</pre>';
        }
    ?>

</body>
</html>