<?php
$conn = mysqli_connect("DB_HOST","DB_USER","DB_PASS","DB_NAME");
if(!$conn){ die("DB Error"); }
session_start();
date_default_timezone_set("Asia/Kolkata");
?>
