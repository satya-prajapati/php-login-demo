<?php
session_start();
$user = "admin";
$pass = "12345";

if($_POST['username'] == $user && $_POST['password'] == $pass){
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
} else {
    echo "Invalid Login <a href='index.php'>Try Again</a>";
}
?>