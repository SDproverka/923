<?php
// Проверяем наличие ID в параметрах запроса
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Подключаем базу данных
    include 'bd.php';
    
    $user_id = intval($_GET['id']);
    
    // Подготавливаем безопасный запрос на удаление
    $sql = "DELETE FROM `users` WHERE `id_user` = ?";
    
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }
    
    $connect->close();
}

// Перенаправляем обратно в админку
header("Location: admin.php");
exit;
?>
