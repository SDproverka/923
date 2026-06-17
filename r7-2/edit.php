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
    $name = $_POST['username'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    
    $sql_update = "UPDATE `users` SET `name` = ?, `login` = ?, `email` = ? WHERE `id_user` = ?";
    if ($stmt_update = $connect->prepare($sql_update)) {
        $stmt_update->bind_param("sssi", $name, $login, $email, $user_id);
        $stmt_update->execute();
        $stmt_update->close();
        
        // Перенаправляем в админку после успешного обновления
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

// Если пользователь с таким ID не найден — возвращаем в админку
if (!$user_data) {
    $connect->close();
    header("Location: admin.php");
    exit;
}

$connect->close();
include 'header.php';
?>

<main class="container my-5">
    <div class="w-50 mx-auto bg-white rounded-4 shadow-sm overflow-hidden border border-light">
        <div class="bg-warning text-dark p-3 fs-5 fw-medium text-start ps-4">
            Редактирование пользователя #<?= $user_id ?>
        </div>
        
        <form action="" method="post" class="p-4 px-5">
            <div class="mb-3">
                <label for="editName" class="form-label fs-5 text-muted">Имя</label>
                <input type="text" class="form-control rounded-pill shadow-sm px-3 fs-5" id="editName" name="username" value="<?= htmlspecialchars($user_data['name']) ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="editLogin" class="form-label fs-5 text-muted">Логин</label>
                <input type="text" class="form-control rounded-pill shadow-sm px-3 fs-5" id="editLogin" name="login" value="<?= htmlspecialchars($user_data['login']) ?>" required>
            </div>
            
            <div class="mb-4">
                <label for="editEmail" class="form-label fs-5 text-muted">Email</label>
                <input type="email" class="form-control rounded-pill shadow-sm px-3 fs-5" id="editEmail" name="email" value="<?= htmlspecialchars($user_data['email']) ?>" required>
            </div>
            
            <div class="d-flex gap-3">
                <a href="admin.php" class="btn btn-secondary w-50 rounded-pill py-2 shadow-sm fs-5">Отмена</a>
                <button type="submit" class="btn btn-warning w-50 rounded-pill py-2 shadow-sm fw-normal fs-5">Сохранить</button>
            </div>
        </form>
    </div>
</main>

<?php 
include 'footer.php'; 
?>
