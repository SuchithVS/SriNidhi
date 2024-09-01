<?php
session_start();
require_once '../config.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    if(empty($username_err) && empty($password_err)){
        if($username == "admin" && $password == "password"){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("location: dashboard.php");
        } else{
            $login_err = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Admin Login</h2>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>    
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>