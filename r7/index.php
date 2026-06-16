<?php
include 'bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO `users` (`name`, `login`, `email`, `password`) VALUES (?, ?, ?, ?)";
    
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("ssss", $_POST['username'], $_POST['login'], $_POST['email'], $hashed_password);
        $stmt->execute();
        $stmt->close();
    }
    
    $connect->close();
    echo "<script>window.location.replace(window.location.pathname);</script>";
    exit;
}

include 'header.php';
?>

<!-- Кастомные стили для двухколоночного лейаута с прозрачной формой -->
<style>
    /* Контейнер, разделяющий экран на две части */
    .split-layout-container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 50px; /* Отступ между формой и картинкой */
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Левая колонка с формой регистрации */
    .split-form-side {
        flex: 1;
        max-width: 450px;
        width: 100%;
    }

    /* ИЗМЕНЕНО: Настройка прозрачности только для панели создания аккаунта */
    .split-form-side .reg-card {
        background: linear-gradient(135deg, rgba(61, 11, 13, 0.4) 0%, rgba(83, 8, 14, 0.3) 100%) !important;
        backdrop-filter: blur(16px) saturate(140%) !important;
        -webkit-backdrop-filter: blur(16px) saturate(140%) !important;
        border: 1px solid rgba(114, 9, 15, 0.35) !important;
        margin: 0;
    }

    /* Правая колонка с изображением пластинки */
    .split-media-side {
        flex: 1;
        max-width: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Оставляем картинку полностью насыщенной и непрозрачной */
    .premium-showcase-img {
        width: 100%;
        height: auto;
        max-height: 550px;
        object-fit: cover;
        border-radius: 24px;
        box-shadow: 0 15px 45px rgba(2, 1, 1, 0.8),
                    0 0 30px rgba(147, 5, 16, 0.2);
        border: 1px solid rgba(114, 9, 15, 0.3);
    }

    /* Адаптивность для мобильных устройств */
    @media (max-width: 868px) {
        .split-layout-container {
            flex-direction: column;
            gap: 30px;
            padding: 0 15px;
        }
        .split-media-side, .split-form-side {
            max-width: 100%;
        }
        .premium-showcase-img {
            max-height: 350px;
        }
    }
</style>

<main class="main-centered">
    <div class="split-layout-container">
        
        <!-- ЛЕВАЯ СТОРОНА: Прозрачная панель создания аккаунта -->
        <div class="split-form-side">
            <div class="reg-card"> 
                <div class="reg-card-header">
                    <h2 style="font-weight: bold; margin: 0 0 5px 0; font-size: 24px; color: #fff;">Создать аккаунт</h2>
                    <p style="color: rgba(243, 244, 246, 0.6); margin: 0; font-size: 14px;">Заполните поля формы для добавления в базу данных</p>
                </div>
                
                <form action="" method="post">
                    <div class="form-group-premium">
                        <input type="text" class="form-control form-control-premium" id="regName" name="username" placeholder="Имя" required>
                        <label for="regName">Ваше имя</label>
                    </div>
                    
                    <div class="form-group-premium">
                        <input type="text" class="form-control form-control-premium" id="regLogin" name="login" placeholder="Логин" required>
                        <label for="regLogin">Уникальный логин</label>
                    </div>
                    
                    <div class="form-group-premium">
                        <input type="email" class="form-control form-control-premium" id="regEmail" name="email" placeholder="Email" required>
                        <label for="regEmail">Электронная почта</label>
                    </div>
                    
                    <div class="form-group-premium">
                        <input type="password" class="form-control form-control-premium" id="regPassword" name="password" placeholder="Пароль" required>
                        <label for="regPassword">Надежный пароль</label>
                    </div>
                    
                    <button type="submit" class="btn-reg-premium">
                        Зарегистрироваться
                    </button>
                </form>
            </div>
        </div>

        <!-- ПРАВАЯ СТОРОНА: Полностью непрозрачная яркая фотография -->
        <div class="split-media-side">
            <img src="qwer.jpeg" alt="Vinyl Music System" class="premium-showcase-img">
        </div>
        
    </div>
</main>

<?php include 'footer.php'; ?>
