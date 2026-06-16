<?php
include 'bd.php';

// Проверяем, передан ли корректный ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$user_id = intval($_GET['id']);

// Обработка отправки формы (сохранение изменений)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $connect->real_escape_string($_POST['username']);
    $login = $connect->real_escape_string($_POST['login']);
    $email = $connect->real_escape_string($_POST['email']);
    
    $sql_update = "UPDATE `users` SET `name` = ?, `login` = ?, `email` = ? WHERE `id_user` = ?";
    if ($stmt_update = $connect->prepare($sql_update)) {
        $stmt_update->bind_param("sssi", $name, $login, $email, $user_id);
        $stmt_update->execute();
        $stmt_update->close();
        
        $connect->close();
        header("Location: admin.php");
        exit;
    }
}

// Получаем текущие данные пользователя для предзаполнения формы
$user_data = null;
$sql_select = "SELECT `name`, `login`, `email` FROM `users` WHERE `id_user` = ?";
if ($stmt_select = $connect->prepare($sql_select)) {
    $stmt_select->bind_param("i", $user_id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    $user_data = $result->fetch_assoc();
    $stmt_select->close();
}

if (!$user_data) {
    $connect->close();
    header("Location: admin.php");
    exit;
}

$connect->close();
include 'header.php';
?>

<!-- Используем флекс-класс для выравнивания карточки по центру экрана -->
<main class="main-centered">
    <!-- Класс reg-card автоматически применит красивый винный градиент и тень -->
    <div class="reg-card">
        <div class="reg-card-header">
            <h2 style="font-weight: bold; margin: 0 0 5px 0; font-size: 24px; color: #fff;">Редактирование</h2>
            <p style="color: rgba(243, 244, 246, 0.6); margin: 0; font-size: 14px;">Изменение данных пользователя #<?= $user_id ?></p>
        </div>
        
        <form action="" method="post">
            <div class="form-group-premium">
                <input type="text" id="editName" name="username" value="<?= htmlspecialchars($user_data['name']) ?>" required>
                <label for="editName">Имя пользователя</label>
            </div>
            
            <div class="form-group-premium">
                <input type="text" id="editLogin" name="login" value="<?= htmlspecialchars($user_data['login']) ?>" required>
                <label for="editLogin">Логин</label>
            </div>
            
            <div class="form-group-premium">
                <input type="email" id="editEmail" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" required>
                <label for="editEmail">Email адрес</label>
            </div>
            
            <!-- Блок кнопок управления в одну строку -->
            <div class="d-flex gap-3" style="margin-top: 15px; width: 100%;">
                <a href="admin.php" class="btn-reg-premium" style="background-color: rgba(243, 244, 246, 0.1) !important; border-color: rgba(243, 244, 246, 0.2) !important; text-decoration: none; text-align: center; width: 50%; padding: 12px 0; font-size: 16px;">
                    Отмена
                </a>
                <button type="submit" class="btn-reg-premium" style="width: 50%; padding: 12px 0; font-size: 16px; margin-top: 0;">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
</main>

<?php 
include 'footer.php'; 
?>
