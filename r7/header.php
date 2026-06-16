<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
    
    <meta name="theme-color" content="#020101" />
    <meta name="msapplication-navbutton-color" content="#020101" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

    <!-- Запрос идет только к вашему автономному CSS файлу -->
    <link rel="stylesheet" href="assets/css/sepd.css">
</head>
<body>
    <header style="position: sticky; top: 0; z-index: 1000;">
        <nav class="navbar-glass">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="brand-glow fw-bold fs-4 d-flex align-items-center gap-2" href="index.php" style="font-size: 24px; font-weight: bold;">
                    <span>UserDB</span>
                </a>
                <div>
                    <ul class="navbar-nav">
                        <li>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active-premium' : ''; ?>" href="index.php">Регистрация</a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active-premium' : ''; ?>" href="admin.php">Админ-панель</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
