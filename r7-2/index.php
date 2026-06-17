<?php
include 'bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = sprintf(
        "INSERT INTO `users` (`id_user`, `name`, `login`, `email`, `password`) VALUES (NULL, '%s', '%s', '%s', '%s')",
        $connect->real_escape_string($_POST['username']),
        $connect->real_escape_string($_POST['login']),
        $connect->real_escape_string($_POST['email']),
        $connect->real_escape_string($_POST['password'])
    );
    $result = $connect->query($sql);
    if ($result) { echo "<script>window.location.replace(window.location.pathname);</script>"; }
    $connect->close(); exit;
}

include 'header.php';
?>

<style>
/* index.php — Стиль Neo-Glow с Чёткой Сакурой на фоне */


/* Центрируем форму */
.registration-section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

/* Белая карточка */
.form-card {
    background: white;
    max-width: 400px;
    width: 100%;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    overflow: hidden;
}

/* Заголовок */
.form-header {
    background: #0D1A2F;
    padding: 30px;
    text-align: center;
}

.form-header h2 {
    color: white;
    font-size: 24px;
    margin: 0;
}

.form-header p {
    color: #aaa;
    font-size: 14px;
    margin: 5px 0 0;
}

/* Тело формы */
.form-body {
    padding: 30px;
}

/* Группы полей */
.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-size: 14px;
    font-weight: bold;
    color: #333;
    margin-bottom: 6px;
}

/* Поля ввода */
.input-field {
    width: 100%;
    padding: 12px;
    border: 1px solid #948a8a;
    border-radius: 8px;
    font-size: 14px;
    box-sizing: border-box;
}

.input-field:focus {
    border-color: #0D1A2F;
    outline: none;
}

/* Кнопка */
.btn-submit {
    background: #0D1A2F;
    color: white;
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
}

.btn-submit:hover {
    background: #1a2f4a;
}
</style>


<section class="registration-section">
    <!-- Блок формы (теперь один на странице, картинка ушла на задний план) -->
    <div class="form-card">
        <div class="form-header">
            <h2>Регистрация</h2>
            <p>Пример записи данных в БД</p>
        </div>
        
        <form action="" method="post" class="form-body">
            <div class="input-group">
                <label for="regName">Имя</label>
                <input type="text" class="input-field" id="regName" name="username" placeholder="Введите имя" required>
            </div>
            
            <div class="input-group">
                <label for="regLogin">Логин</label>
                <input type="text" class="input-field" id="regLogin" name="login" placeholder="Придумайте уникальный логин" required>
            </div>
            
            <div class="input-group">
                <label for="regEmail">Email</label>
                <input type="email" class="input-field" id="regEmail" name="email" placeholder="example@mail.com" required>
            </div>
            
            <div class="input-group">
                <label for="regPassword">Пароль</label>
                <input type="password" class="input-field" id="regPassword" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn-submit">
                Зарегистрироваться
            </button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>
