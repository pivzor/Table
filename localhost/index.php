<?php
$pdo = new PDO("mysql:host=localhost;dbname=repository;charset=utf8", "root", "");
$query = "
    SELECT 
        products.id,
        products.name AS product_name,
        categories.name AS category_name,
        stock.quantity
    FROM products
    JOIN categories ON products.category_id = categories.id
    JOIN stock ON stock.product_id = products.id
";

$products = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад товаров</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Список товаров на складе</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Название товара</th>
                <th>Категория</th>
                <th>Остаток</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['id']) ?></td>
                <td><?= htmlspecialchars($product['product_name']) ?></td>
                <td><?= htmlspecialchars($product['category_name']) ?></td>
                <td><?= htmlspecialchars($product['quantity']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
