<?php
require_once '../config.php';

$id = getGetData('id');

$sql = "SELECT orders.*, order_items.*, menu_items.name AS item_name 
        FROM orders 
        JOIN order_items ON orders.id = order_items.order_id 
        JOIN menu_items ON order_items.menu_item_id = menu_items.id 
        WHERE orders.id='$id'";
$result = mysqli_query($link, $sql);

$order_items = [];
while ($item = mysqli_fetch_assoc($result)) {
    $order_items[] = $item;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Order Details</h1>
        <h3>Order ID: <?php echo $id; ?></h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($order_items as $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($item['price']); ?></td>
                    <td><?php echo htmlspecialchars($subtotal); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Total Amount: $<?php echo number_format($total, 2); ?></h3>
        <a href="manage_orders.php" class="btn btn-secondary">Back to Orders</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
