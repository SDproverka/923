<?php
// Блокируем прямой вызов файла в браузере для безопасности
if (count(get_included_files()) === 1) { exit("Доступ запрещен"); }

$host = "localhost";
$user = "root";
$pass = "";


$connect = new mysqli($host, $user, $pass, $db_name);

if ($connect->connect_error) {
    die("Ошибка подключения к БД: " . $connect->connect_error);
}

// Установка UTF-8 для корректного отображения русских букв
$connect->set_charset("utf8mb4");
?>
