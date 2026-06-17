<?php
include 'bd.php';
include 'header.php';

?>

<style>


/* Центрирование таблицы */
.table-responsive {
    display: flex;
    justify-content: center;
}

.table-custom {
    width: 100%;
    max-width: 1200px;
    border: 2px solid #000000;
    border-collapse: collapse;
}



/* Центрирование текста в ячейках */
table tbody td {
    text-align: center;
}

table thead th {
    text-align: center;
}

/* Левое выравнивание для ID и имени */
table tbody td:first-child,
table tbody td:nth-child(2),
table thead th:first-child,
table thead th:nth-child(2) {
    text-align: left;
}
</style>

<?php
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

<div class="container-fluid pe-md-4">
    <div class="row">
        <!-- ПРАВАЯ ЧАСТЬ (Основной контент и аналитика) -->
        <main class="col-12 col-md-9 col-lg-10 py-4 px-md-4">
           
            <!-- КАРТОЧКА С ТАБЛИЦЕЙ -->
            <div class="bg-white rounded-4 shadow-sm border p-4">
                <div class="mb-4 border-bottom pb-3 text-center">
                    <h3 class="fw-bold mb-1 text-dark fs-4">Список записей</h3>
                    <p class="text-muted small mb-0">Управление зарегистрированными аккаунтами в базе данных</p>
                </div>

                <div class="table-responsive rounded-3">
                    <table class="table table-custom align-middle mb-0">
                        <thead>
                            <tr class="text-uppercase fs-7 tracking-wider">
                                <th scope="col" class="py-3 ps-3" style="width: 10%;">ID</th>
                                <th scope="col" class="py-3" style="width: 25%;">Имя</th>
                                <th scope="col" class="py-3" style="width: 20%;">Логин</th>
                                <th scope="col" class="py-3" style="width: 25%;">Email</th>
                                <th scope="col" class="py-3 text-center pe-3" style="width: 20%;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold" style="color: #4A7FA7;">#<?= htmlspecialchars($user['id_user']) ?></td>
                                        <td><div class="fw-semibold text-dark"><?= htmlspecialchars($user['name']) ?></div></td>
                                        <td><span class="badge custom-login-badge"><?= htmlspecialchars($user['login']) ?></span></td>
                                        <td class="text-secondary"><?= htmlspecialchars($user['email']) ?></td>
                                        <td class="text-center pe-3">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="edit.php?id=<?= $user['id_user'] ?>" class="btn btn-sm btn-action-edit rounded-3 px-3 fw-medium">Изменить</a>
                                                <a href="delete.php?id=<?= $user['id_user'] ?>" class="btn btn-sm btn-action-delete rounded-3 px-3 fw-medium" onclick="return confirm('Удалить?')">Удалить</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">База данных пуста</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include 'footer.php'; ?>