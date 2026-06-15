<?php
$teacher = [
    'Фамилия'   => 'Лаврецкая',
    'Имя'       => 'Елизавета',
    'Отчество'  => 'Викторовна',
    'Логин'     => 'elizaveta',
    'Пароль'    => '12345',
    'Email'     => 'lovel@mail.ru'
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о преподавателе</title>
</head>
<body>

<div class="card">
    <h2>Преподаватель</h2>
    <p><strong>Фамилия:</strong> <?php echo $teacher['Фамилия']; ?></p>
    <p><strong>Имя:</strong> <?php echo $teacher['Имя']; ?></p>
    <p><strong>Отчество:</strong> <?php echo $teacher['Отчество']; ?></p>
    <p><strong>Логин:</strong> <?php echo $teacher['Логин']; ?></p>
    <p><strong>Email:</strong> <?php echo $teacher['Email']; ?></p>
</div>

</body>
</html>