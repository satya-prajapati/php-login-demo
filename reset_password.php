<?php
require "config.php";
$error="";

if(!isset($_GET['token'])){
    die("Invalid request");
}

$token = $_GET['token'];

$q = mysqli_prepare($conn,
 "SELECT id FROM users WHERE reset_token=? AND token_expiry > NOW()"
);
mysqli_stmt_bind_param($q,"s",$token);
mysqli_stmt_execute($q);
mysqli_stmt_store_result($q);

if(mysqli_stmt_num_rows($q)!=1){
    die("Link expired or invalid");
}

mysqli_stmt_bind_result($q,$uid);
mysqli_stmt_fetch($q);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $u = mysqli_prepare($conn,
      "UPDATE users SET password=?, reset_token=NULL, token_expiry=NULL WHERE id=?"
    );
    mysqli_stmt_bind_param($u,"si",$pass,$uid);
    mysqli_stmt_execute($u);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<style>
body{font-family:Arial;background:#eef2ff}
.box{width:360px;margin:100px auto;background:#fff;padding:25px;border-radius:8px}
input,button{width:100%;padding:10px;margin:8px 0}
button{background:#22c55e;color:#fff;border:none}
</style>
</head>
<body>
<div class="box">
<h2>Reset Password</h2>
<form method="post">
<input type="password" name="password" placeholder="New Password" required>
<button>Update Password</button>
</form>
</div>
</body>
</html>
