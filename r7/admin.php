<?php
include 'bd.php';
include 'header.php';

$users = [];
$sql = "SELECT `id_user`, `name`, `login`, `email` FROM `users` WHERE `id_user` > ? ORDER BY `id_user` DESC";

if ($stmt = $connect->prepare($sql)) {
    $min_id = 0;
    $stmt->bind_param("i", $min_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) { $users[] = $row; }
    $stmt->close();
}
$connect->close();
?>

<!-- Обертка main-centered автоматически прижмет подвал к низу и выровняет контент -->
<main class="main-centered" style="align-items: flex-start; padding-top: 60px;">
    <div class="container">
        <div class="panel-container rounded-4 p-4 p-md-5" style="background: linear-gradient(135deg, rgba(61, 11, 13, 0.8) 0%, rgba(83, 8, 14, 0.65) 100%); border: 1px solid rgba(114, 9, 15, 0.45); border-radius: 16px; padding: 30px; box-shadow: 0 8px 32px 0 rgba(2, 1, 1, 0.6);">
            
            <!-- Шапка панели управления -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-4" style="border-bottom: 1px solid rgba(114, 9, 15, 0.3); margin-bottom: 25px; padding-bottom: 20px;">
                <div>
                    <h2 style="font-weight: bold; margin: 0 0 5px 0; font-size: 28px; color: #fff;">Панель управления</h2>
                    <p class="small mb-0" style="color: rgba(243, 244, 246, 0.6); margin: 0; font-size: 14px;">Просмотр, редактирование и удаление учетных записей пользователей</p>
                </div>
                <div>
                    <span style="background-color: rgba(178, 31, 41, 0.15); color: #b21f29; border: 1px solid rgba(147, 5, 16, 0.3); padding: 8px 16px; border-radius: 50px; font-weight: 600; font-size: 14px;">
                        Всего: <?= count($users) ?> чел.
                    </span>
                </div>
            </div>

            <!-- Адаптивная таблица пользователей -->
            <div style="border: 1px solid rgba(114, 9, 15, 0.4); background-color: rgba(2, 1, 1, 0.4); border-radius: 8px; overflow: hidden;">
                <table style="width: 100%; border-collapse: collapse; color: #e5e7eb; text-align: left;">
                    <thead>
                        <tr style="background-color: rgba(61, 11, 13, 0.9); border-bottom: 2px solid rgba(114, 9, 15, 0.6); text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">
                            <th style="padding: 15px 20px; color: rgba(178, 31, 41, 0.9); width: 10%;">ID</th>
                            <th style="padding: 15px 20px; color: rgba(178, 31, 41, 0.9); width: 25%;">Имя пользователя</th>
                            <th style="padding: 15px 20px; color: rgba(178, 31, 41, 0.9); width: 20%;">Логин</th>
                            <th style="padding: 15px 20px; color: rgba(178, 31, 41, 0.9); width: 30%;">Email адрес</th>
                            <th style="padding: 15px 20px; color: rgba(178, 31, 41, 0.9); width: 15%; text-align: center;">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr style="border-bottom: 1px solid rgba(114, 9, 15, 0.2); transition: background-color 0.2s ease;">
                                    <td style="padding: 15px 20px; font-weight: bold; color: rgba(178, 31, 41, 0.8);">#<?= htmlspecialchars($user['id_user']) ?></td>
                                    <td style="padding: 15px 20px; font-weight: 600; color: #fff;"><?= htmlspecialchars($user['name']) ?></td>
                                    <td style="padding: 15px 20px;">
                                        <span style="background-color: rgba(83, 8, 14, 0.5); color: #f3f4f6; border: 1px solid rgba(114, 9, 15, 0.4); padding: 4px 8px; border-radius: 4px; font-size: 13px;">
                                            <?= htmlspecialchars($user['login']) ?>
                                        </span>
                                    </td>
                                    <td style="padding: 15px 20px; color: rgba(243, 244, 246, 0.7);"><?= htmlspecialchars($user['email']) ?></td>
                                    <td style="padding: 15px 20px; text-align: center;">
                                        <div class="d-flex gap-2" style="justify-content: center; gap: 8px;">
                                            <!-- Кнопка Изменить -->
                                            <a href="edit.php?id=<?= $user['id_user'] ?>" style="background-color: rgba(147, 5, 16, 0.2); color: #f3f4f6; border: 1px solid rgba(147, 5, 16, 0.5); padding: 6px 14px; border-radius: 50px; font-size: 13px; font-weight: 500; text-decoration: none; transition: all 0.2s ease;">
                                                Изменить
                                            </a>
                                            <!-- Кнопка Удалить -->
                                            <a href="delete.php?id=<?= $user['id_user'] ?>" onclick="return confirm('Удалить этого пользователя?')" style="background-color: rgba(178, 31, 41, 0.15); color: rgba(243, 244, 246, 0.8); border: 1px solid rgba(178, 31, 41, 0.3); padding: 6px 14px; border-radius: 50px; font-size: 13px; text-decoration: none; transition: all 0.2s ease;">
                                                Удалить
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center; color: rgba(243, 244, 246, 0.4); padding: 50px 0; font-size: 18px; font-weight: 500;">
                                    Список зарегистрированных пользователей пуст
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
