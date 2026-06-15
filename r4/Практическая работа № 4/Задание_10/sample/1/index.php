<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 10 - Оптимизация</title>
</head>
<body>

    <h1>Задание 10: Ревьюирование сценариев</h1>
    <hr>

    <?php 
    // Подключаем массив с помощью конструкции включения файлов
    require_once 'data.php'; 
    ?>

    <h2>Список музыкальных групп</h2>

    <?php if (isset($team) && is_array($team)): ?>
        <?php foreach ($team as $item): ?>
            <div style="margin-bottom: 20px; border-bottom: 1px dashed #ccc;">
                <strong>Группа:</strong> <?= $item['name'] ?> (id = <?= $item['id_team'] ?>)<br/>
                <strong>Страна:</strong> <?= $item['country'] ?><br />
                <strong>Дата основания:</strong> <?= $item['date'] ?><br />
                <strong>Стиль:</strong> <?= $item['style'] ?><br />
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Массив данных не найден.</p>
    <?php endif; ?>

</body>
</html>
