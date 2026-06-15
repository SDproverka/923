<?php
session_start();

// Если данные не были переданы через сессию, перенаправляем на начало
if (!isset($_SESSION['surname']) || !isset($_SESSION['firstname'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
    <style>
        .result-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            background: #f9f9f9;
        }
        .result-container h3 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .result-item {
            margin: 10px 0;
            padding: 8px;
            background: white;
            border-radius: 5px;
        }
        .result-label {
            font-weight: bold;
            color: #333;
            display: inline-block;
            width: 150px;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background: #333;
            color: white;
        }
        footer a {
            color: #ff6b6b;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <h1>Отправка данных на сервер</h1>
    <h2>Еще о формах</h2>
    <hr>
    
    <div class="result-container">
        <h2>Поздравляем с успешной регистрацией в школе разведчиков</h2>
        
        <h3>Ваши регистрационные данные:</h3>
        
        <div class="result-item">
            <span class="result-label">Фамилия:</span> 
            <?php echo htmlspecialchars($_SESSION['surname'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Имя:</span> 
            <?php echo htmlspecialchars($_SESSION['firstname'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Отчество:</span> 
            <?php echo htmlspecialchars($_SESSION['patronymic'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Должность:</span> 
            <?php echo htmlspecialchars($_SESSION['post'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Категория:</span> 
            <?php echo htmlspecialchars($_SESSION['category'] ?? ''); ?>
        </div>
        <div class="result-item">
            <span class="result-label">Стаж:</span> 
            <?php echo htmlspecialchars($_SESSION['experience'] ?? ''); ?> лет
        </div>
        
        <h3>В ближайшее время с вами свяжется наш человек (в черном).<br>
        Передаст вам оружие, акваланг, ксиву и инструкцию по дальнейшим действиям.</h3>
    </div>

    <footer align="center">
        <h3>Веб-разработка | Профессионалы | Демоэкзамен</h3>
        <a href="https://vk.com/omsk_pro" target="_blank">omsk_PRO</a>
    </footer>
    
    <?php
    // Опционально: очищаем сессию после отображения данных
    // session_destroy();
    ?>
    
</body>
</html>