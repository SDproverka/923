<?php
// Настройки подключения к базе данных
$connect = new mysqli("localhost", "root", "", "users");

// Проверка на ошибку подключения
if ($connect->connect_error) {
    die("Ошибка подключения к БД: " . $connect->connect_error);
}

// Установка кодировки для корректного отображения кириллицы
$connect->set_charset("utf8mb4");
?>
