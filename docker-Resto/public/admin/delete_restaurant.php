<?php
require_once '../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM restaurants WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    header("Location: dashboard.php");
    exit();
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
?>
