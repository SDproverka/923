<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body class="bg-light text-dark d-flex flex-column min-vh-100">
    <header>

      </form>
    </div>
  </div>
</nav>
    </header>
    <section style="min-height: 80vh;" class="d-flex flex-column align-items-center justify-content-center py-5">
        <div class="container fs-4 mb-5">
            <div class="w-50 mx-auto bg-white rounded-4 shadow-sm overflow-hidden border border-light">
                
                <div class="bg-success text-white p-3 fs-5 fw-medium text-start ps-4">
                    Пример записи данных в БД
                </div>
                
                <form action="" method="post" class="p-4 px-5">
                    <h2 class="text-center text-secondary mb-4 fs-2 fw-normal">Регистрация</h2>
                    
                    <div class="mb-3">
                        <label for="regName" class="form-label fs-5 text-muted">Имя</label>
                        <input type="text" class="form-control rounded-pill shadow-sm px-3 fs-5" id="regName" name="username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="regLogin" class="form-label fs-5 text-muted">Логин</label>
                        <input type="text" class="form-control rounded-pill shadow-sm px-3 fs-5" id="regLogin" name="login" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="regEmail" class="form-label fs-5 text-muted">Email</label>
                        <input type="email" class="form-control rounded-pill shadow-sm px-3 fs-5" id="regEmail" name="email" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="regPassword" class="form-label fs-5 text-muted">Пароль</label>
                        <input type="password" class="form-control rounded-pill shadow-sm px-3 fs-5" id="regPassword" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-100 rounded-pill py-2 shadow-sm fw-normal fs-5 my-2">
                        Зарегистрироваться
                    </button>
                </form>
            </div>
        </div>

        <div class="container fs-5 w-75">
            <div class="bg-white rounded-4 shadow-sm p-4 border border-light">
                <h3 class="text-secondary mb-3 fs-4 fw-normal text-center">Список зарегистрированных пользователей</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Логин</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $connect_view = new mysqli("localhost", "root", "", "users");
                            if (!$connect_view->connect_error) {
                                $connect_view->set_charset("utf8mb4");
                                $result_view = $connect_view->query("SELECT `id_user`, `name`, `login`, `email` FROM `users` ORDER BY `id_user` DESC");
                                if ($result_view && $result_view->num_rows > 0) {
                                    while ($row = $result_view->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['id_user']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['login']) . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center text-muted py-3'>Пользователи пока не зарегистрированы</td></tr>";
                                }
                                $connect_view->close();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3 mt-auto fs-6">
        <p class="mb-0">2026 Omsk</p>
    </footer>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $connect = new mysqli("localhost", "root", "", "users");
    
    if ($connect->connect_error) {
        die("Ошибка: " . $connect->connect_error);
    }

    $connect->set_charset("utf8mb4");

    $sql = sprintf(
        "INSERT INTO `users` (`id_user`, `name`, `login`, `email`, `password`) VALUES (NULL, '%s', '%s', '%s', '%s')",
        $connect->real_escape_string($_POST['username']),
        $connect->real_escape_string($_POST['login']),
        $connect->real_escape_string($_POST['email']),
        $connect->real_escape_string($_POST['password'])
    );

    $result = $connect->query($sql);

    if ($result) {
        echo "<script>window.location.replace(window.location.pathname);</script>";
    } else {
        echo "<script>alert('Ошибка SQL: " . addslashes($connect->error) . "');</script>";
    }

    $connect->close();
}
?>
