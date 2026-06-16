<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include 'bd.php';
    $user_id = intval($_GET['id']);
    
    $sql = "DELETE FROM `users` WHERE `id_user` = ?";
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }
    $connect->close();
}
header("Location: admin.php");
exit;
?>
