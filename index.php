<?php
require "config.php";

$error = "";

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $hash);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $hash)) {
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = "Invalid username or password";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f8;
        }
        .box{
            width:350px;
            margin:100px auto;
            background:#fff;
            padding:25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        h2{
            text-align:center;
            margin-bottom:20px;
        }
        input{
            width:100%;
            padding:10px;
            margin:8px 0;
            border:1px solid #ccc;
            border-radius:5px;
        }
        button{
            width:100%;
            padding:10px;
            background:#007bff;
            border:none;
            color:white;
            font-size:16px;
            border-radius:5px;
            cursor:pointer;
        }
        button:hover{
            background:#0056b3;
        }
        .links{
            margin-top:15px;
            text-align:center;
        }
        .links a{
            text-decoration:none;
            color:#007bff;
            margin:0 5px;
        }
        .error{
            color:red;
            text-align:center;
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Login</h2>

    <?php if($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <div class="links">
        <a href="register.php">Create Account</a> |
        <a href="forgot_password.php">Forgot Password?</a>
    </div>
</div>

</body>
</html>
