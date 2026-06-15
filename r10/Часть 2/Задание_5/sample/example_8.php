<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат сохранения</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .result {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .data-item {
            margin: 10px 0;
            padding: 5px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 200px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Результат сохранения данных</h1>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Получаем данные из формы
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $lang = isset($_POST['lang']) ? $_POST['lang'] : [];
        $form = isset($_POST['form']) ? $_POST['form'] : '';
        $interes = isset($_POST['interes']) ? $_POST['interes'] : [];
        
        // Проверка на заполнение обязательных полей
        $errors = [];
        
        if (empty($name)) {
            $errors[] = "Поле 'Имя' обязательно для заполнения";
        }
        
        if (empty($email)) {
            $errors[] = "Поле 'E-mail' обязательно для заполнения";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Введите корректный E-mail адрес";
        }
        
        if (empty($form)) {
            $errors[] = "Выберите форму обучения";
        }
        
        // Если есть ошибки - выводим их
        if (!empty($errors)) {
            echo '<div class="result">';
            echo '<h3 style="color: red;">Ошибки при сохранении:</h3>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo '</ul>';
            echo '<a href="index.php">← Вернуться к редактированию</a>';
            echo '</div>';
        } else {
            // Сохраняем данные (здесь можно добавить сохранение в файл или БД)
            // Для демонстрации просто выводим результат
            
            echo '<div class="result">';
            echo '<p class="success">✓ Данные успешно сохранены!</p>';
            echo '<h3>Сохраненные данные:</h3>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Имя:</span>';
            echo htmlspecialchars($name);
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">E-mail:</span>';
            echo htmlspecialchars($email);
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Выбранные курсы:</span>';
            if (!empty($lang)) {
                $langNames = [
                    'java' => 'Разработчик игр на Java',
                    'php' => 'Программирование на PHP',
                    'python' => 'Занимательный Python',
                    'perl' => 'Язык программирования Perl за 24 часа',
                    'javascript' => 'Javascript в примерах'
                ];
                $selectedLangs = [];
                foreach ($lang as $value) {
                    if (isset($langNames[$value])) {
                        $selectedLangs[] = $langNames[$value];
                    }
                }
                echo implode(', ', $selectedLangs);
            } else {
                echo 'Не выбрано ни одного курса';
            }
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Форма обучения:</span>';
            echo htmlspecialchars($form);
            echo '</div>';
            
            echo '<div class="data-item">';
            echo '<span class="label">Интересующие направления:</span>';
            if (!empty($interes)) {
                echo implode(', ', array_map('htmlspecialchars', $interes));
            } else {
                echo 'Не выбрано ни одного направления';
            }
            echo '</div>';
            
            echo '<a href="index.php">← Редактировать снова</a>';
            echo ' | ';
            echo '<a href="index.php">← На главную</a>';
            echo '</div>';
        }
        
        // Дополнительно: пример сохранения в файл (раскомментируйте при необходимости)
        /*
        $saveData = [
            'name' => $name,
            'email' => $email,
            'lang' => implode(', ', $lang),
            'form' => $form,
            'interes' => implode(', ', $interes),
            'save_date' => date('Y-m-d H:i:s')
        ];
        
        $jsonData = json_encode($saveData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents('saved_data.json', $jsonData);
        */
        
    } else {
        // Если кто-то зашел напрямую на example_8.php без отправки формы
        echo '<div class="result">';
        echo '<p style="color: orange;">Нет данных для обработки. Пожалуйста, заполните форму.</p>';
        echo '<a href="index.php">← Перейти к форме редактирования</a>';
        echo '</div>';
    }
    ?>
    
</body>
</html>