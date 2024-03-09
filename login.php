<?php
    session_start();
    if(isset($_SESSION["users"])){
        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="login.css">
    <title>Log In</title>
</head>
<body>
<div class = "container">
<form actions = registration.php class = "form" method = "post">
<div class="login wrap">
    <?php
    if(isset ($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if(password_verify($password, $user["password"])) {
                $_SESSION["users"] = $user["ID"];
                header("Location: home.php");
                die();
            } else {
                echo "<div class= 'alert alert-danger'> Password does not match </div>";
            }
        } else {
            echo "<div class= 'alert alert-danger'> Email does not match </div>";
        }
    } 
    ?>
  <div class="h1">Login</div>
  <!-- <input pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" placeholder="Email" id="email" name="email" type="text"> -->
  <input placeholder="Email" id="email" name="email" type="text">
  <input placeholder="Password" id="password" name="password" type="password">
  <input value="Login" class="btn" id="login" value = "login" type="submit" name = "login">
  <div><p class="reg">Not Registered yet? <a href="registration.php">Register Here</a></div>
</div>
</div>
</form>
</body>
</html>