<?php
require_once '../config.php';

$table_id = getGetData('table_id');

$sql = "SELECT * FROM reservations WHERE table_id='$table_id' ORDER BY reservation_date, reservation_time";
$result = mysqli_query($link, $sql);

$reservations = [];
while ($reservation = mysqli_fetch_assoc($result)) {
    $reservations[] = $reservation;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Reservations for Table <?php echo htmlspecialchars($table_id); ?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?php echo htmlspecialchars($reservation['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['customer_email']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['reservation_date']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['reservation_time']); ?></td>
                    <td><?php echo htmlspecialchars($reservation['guests']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="manage_tables.php" class="btn btn-secondary">Back to Tables</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
