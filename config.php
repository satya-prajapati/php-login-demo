// <?php
// $conn = mysqli_connect("DB_HOST","DB_USER","DB_PASS","DB_NAME");
// if(!$conn){ die("DB Error"); }
// session_start();
// date_default_timezone_set("Asia/Kolkata");
// ?>


<?php
$host = "DB_HOST";
$db   = "DB_NAME";
$user = "DB_USER";
$pass = "DB_PASS";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed");
}

session_start();
date_default_timezone_set("Asia/Kolkata");
?>
