<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа</title>
</head>
<body>

<h1>Оформление заказа</h1>

<?php
// 1. Индексный массив заказов (товары)
$orders = [
    [
        "product" => "Ноутбук ASUS",
        "quantity" => 1,
        "price" => 55000
    ],
    [
        "product" => "Мышь Logitech",
        "quantity" => 2,
        "price" => 1500
    ],
    [
        "product" => "Клавиатура Defender",
        "quantity" => 1,
        "price" => 2500
    ]
];

// 2. Преобразуем индексный массив заказов в JSON-строку
$jsonOrders = json_encode($orders, JSON_UNESCAPED_UNICODE);
?>

<form action="order_handler.php" method="post">
    <h3>Данные заказчика</h3>
    Имя: <input type="text" name="customer_name" required><br><br>
    Email: <input type="email" name="customer_email" required><br><br>
    Телефон: <input type="text" name="customer_phone"><br><br>

    <h3>Состав заказа</h3>
    <ul>
        <?php foreach ($orders as $item): ?>
            <li><?= $item["product"] ?> — <?= $item["quantity"] ?> шт. × <?= $item["price"] ?> руб.</li>
        <?php endforeach; ?>
    </ul>

    <!-- Скрытое поле с JSON-представлением заказов -->
    <input type="hidden" name="orders_json" value="<?= htmlspecialchars($jsonOrders) ?>">

    <input type="submit" value="Оформить заказ">
</form>

</body>
</html>