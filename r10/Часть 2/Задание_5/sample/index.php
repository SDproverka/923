<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование данных пользователя</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-section {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-section h3 {
            margin-top: 0;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 300px;
            padding: 5px;
            margin: 5px 0;
        }
        .checkbox-group, .radio-group {
            margin: 10px 0;
        }
        .checkbox-group label, .radio-group label {
            font-weight: normal;
            margin-right: 15px;
        }
        select {
            width: 400px;
            padding: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        hr {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    
    <h1>Редактирование данных пользователя</h1>
    
    <?php
    require "user.php";
    
    // Разбиваем строку lang в массив для удобной проверки чекбоксов
    $userLang = array_map('trim', explode(',', $user['lang']));
    
    // Разбиваем строку interes в массив
    $userInteres = array_map('trim', explode(',', $user['interes']));
    ?>

    <form action="example_8.php" method="post">
        <div class="form-section">
            <label>Имя:</label><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"><br>
            
            <label>E-mail:</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br>
        </div>
        
        <div class="form-section">
            <h3>Выберите интересующий вас курс:</h3>
            <div class="checkbox-group">
                <input type="checkbox" name="lang[]" value="java" 
                    <?php echo in_array('java', $userLang) ? 'checked' : ''; ?> /> 
                Разработчик игр на Java <br>
                
                <input type="checkbox" name="lang[]" value="php" 
                    <?php echo in_array('php', $userLang) ? 'checked' : ''; ?> /> 
                Программирование на PHP <br>
                
                <input type="checkbox" name="lang[]" value="python" 
                    <?php echo in_array('python', $userLang) ? 'checked' : ''; ?> /> 
                Занимательный Python <br>
                
                <input type="checkbox" name="lang[]" value="perl" 
                    <?php echo in_array('perl', $userLang) ? 'checked' : ''; ?> /> 
                Язык программирования Perl за 24 часа <br>
                
                <input type="checkbox" name="lang[]" value="javascript" 
                    <?php echo in_array('javascript', $userLang) ? 'checked' : ''; ?> /> 
                Javascript в примерах
            </div>
        </div>

        <div class="form-section">
            <h3>Выберите форму обучения:</h3>
            <div class="radio-group">
                <input type="radio" name="form" value="очное" 
                    <?php echo ($user['form'] == 'очное') ? 'checked' : ''; ?> /> 
                очное <br>
                
                <input type="radio" name="form" value="очно-заочное" 
                    <?php echo ($user['form'] == 'очно-заочное') ? 'checked' : ''; ?> /> 
                очно-заочное <br>
                
                <input type="radio" name="form" value="заочное" 
                    <?php echo ($user['form'] == 'заочное') ? 'checked' : ''; ?> /> 
                заочное <br>    
                
                <input type="radio" name="form" value="дистанционное" 
                    <?php echo ($user['form'] == 'дистанционное') ? 'checked' : ''; ?> /> 
                дистанционное
            </div>
        </div>      

        <div class="form-section">
            <h3>Какие направления ИТ вас могли бы заинтересовать:</h3>
            <select name="interes[]" size="5" multiple>
                <option value="Веб и интернет-технологии"
                    <?php echo in_array('Веб и интернет-технологии', $userInteres) ? 'selected' : ''; ?>>
                    Веб и интернет-технологии
                </option>
                <option value="Разработка программ для компьютеров и смартфонов"
                    <?php echo in_array('Разработка программ для компьютеров и смартфонов', $userInteres) ? 'selected' : ''; ?>>
                    Разработка программ для компьютеров и смартфонов
                </option>
                <option value="Программирование роботов и умных устройств"
                    <?php echo in_array('Программирование роботов и умных устройств', $userInteres) ? 'selected' : ''; ?>>
                    Программирование роботов и умных устройств
                </option>
                <option value="Искусственный интеллект и машинное обучение"
                    <?php echo in_array('Искусственный интеллект и машинное обучение', $userInteres) ? 'selected' : ''; ?>>
                    Искусственный интеллект и машинное обучение
                </option>
                <option value="Инфраструктура — сети, серверы, администрирование"
                    <?php echo in_array('Инфраструктура — сети, серверы, администрирование', $userInteres) ? 'selected' : ''; ?>>
                    Инфраструктура — сети, серверы, администрирование
                </option>
            </select>
        </div>

        <input type="submit" value="Сохранить изменения">
    </form>

</body>
</html>