<?php
require "config.php";
$msg = "";
$link = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = trim($_POST['username']);
    $token = bin2hex(random_bytes(32));
    $expiry = date("Y-m-d H:i:s", strtotime("+15 minutes"));

    $q = mysqli_prepare($conn,
        "UPDATE users SET reset_token=?, token_expiry=? WHERE username=?"
    );
    mysqli_stmt_bind_param($q,"sss",$token,$expiry,$username);
    mysqli_stmt_execute($q);

    if(mysqli_stmt_affected_rows($q)){
        $link = "https://www.dizihal.shop/reset_password.php?token=".$token;
        $msg = "Password reset link generated (valid 15 min)";
    } else {
        $msg = "User not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<style>
body{font-family:Arial;background:#f1f5f9}
.box{width:360px;margin:100px auto;background:#fff;padding:25px;border-radius:8px}
input,button{width:100%;padding:10px;margin:8px 0}
button{background:#6366f1;color:#fff;border:none}
.msg{color:green;font-size:14px}
.link{word-break:break-all;font-size:13px}
</style>
</head>
<body>
<div class="box">
<h2>Forgot Password</h2>
<form method="post">
<input name="username" placeholder="Enter username" required>
<button>Generate Reset Link</button>
</form>
<div class="msg"><?= $msg ?></div>
<div class="link"><?= $link ?></div>
<a href="index.php">Back to login</a>
</div>
</body>
</html>
