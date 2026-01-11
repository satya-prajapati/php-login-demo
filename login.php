<?php
session_start();
$user = "admin";
$user1 = "satya";
$user2 = "shiv";

$pass = "12345";
$pass1 = "satya";
$pass2 = "shiv";

if($_POST['username'] == $user || $user1 || $user2  && $_POST['password'] == $pass || $pass1 || $pass2){
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
} else {
    echo "Invalid Login <a href='index.php'>Try Again</a>";
}
?>
