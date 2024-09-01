<?php
require_once '../config.php';

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($link, $sql);

$orders = [];
while ($order = mysqli_fetch_assoc($result)) {
    $orders[] = $order;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Orders</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Table ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars($order['table_id']); ?></td>
                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                    <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                    <td>
                        <a href="update_order_status.php?id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Update Status</a>
                        <a href="view_order.php?id=<?php echo $order['id']; ?>" class="btn btn-info btn-sm">View Details</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
