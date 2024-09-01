<?php
require_once '../config.php';

$id = getGetData('id');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = getPostData('status');

    $sql = "UPDATE orders SET status='$status' WHERE id='$id'";

    if (mysqli_query($link, $sql)) {
        header("Location: manage_orders.php");
        exit();
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
} else {
    $sql = "SELECT status FROM orders WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    $order = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Update Order Status</h1>
        <form method="POST" action="update_order_status.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" <?php echo $order['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="preparing" <?php echo $order['status'] == 'preparing' ? 'selected' : ''; ?>>Preparing</option>
                    <option value="served" <?php echo $order['status'] == 'served' ? 'selected' : ''; ?>>Served</option>
                    <option value="paid" <?php echo $order['status'] == 'paid' ? 'selected' : ''; ?>>Paid</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
