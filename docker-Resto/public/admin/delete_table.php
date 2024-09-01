<?php
require_once '../config.php';

$id = getGetData('id');

$sql = "DELETE FROM tables WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    header("Location: manage_tables.php");
    exit();
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
?>
