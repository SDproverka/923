<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
    <!-- 1. Базовый Bootstrap (строит сетку) -->
    <link rel="stylesheet" href="assets/css/sepd.css">
    <!-- 2. Ваши кастомные цвета (перекрашивают сетку) -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
</head>
<body class="bg-light text-dark d-flex flex-column min-vh-100">

    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-glass shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4 text-success d-flex align-items-center gap-2" href="index.php">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/></svg>
                    <span>UserDB</span>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-2">
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded-pill <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active bg-secondary bg-opacity-20 fw-medium' : ''; ?>" href="index.php">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 rounded-pill <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active bg-secondary bg-opacity-20 fw-medium' : ''; ?>" href="admin.php">Админ-панель</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
