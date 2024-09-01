<?php
require_once 'config.php';

$restaurant_id = isset($_GET['restaurant_id']) ? $_GET['restaurant_id'] : 0;

// Fetch the restaurant details
$sql = "SELECT * FROM restaurants WHERE id = '$restaurant_id'";
$result = mysqli_query($link, $sql);
$restaurant = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    $sql = "INSERT INTO reservations (restaurant_id, customer_name, customer_email, reservation_date, reservation_time, guests)
            VALUES ('$restaurant_id', '$name', '$email', '$date', '$time', '$guests')";

    if (mysqli_query($link, $sql)) {
        header("Location: reservation_confirmation.php");
        exit();
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Table at <?php echo htmlspecialchars($restaurant['name']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Book a Table at <?php echo htmlspecialchars($restaurant['name']); ?></h1>
        <form method="POST" action="booking.php?restaurant_id=<?php echo $restaurant_id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" id="guests" name="guests" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
