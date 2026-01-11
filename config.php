<?php
$host = "dpg-d5hp0cmmcj7s73b5pps0-a";
$port = "5432";
$db   = "dizihal_db";
$user = "dizihal_db_user";
$pass = "45GRDBPK4V2bh2MIxra1KV0RIuLxBAzE";

try {
    $conn = new PDO(
        "pgsql:host=$host;port=$port;dbname=$db",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

session_start();
date_default_timezone_set("Asia/Kolkata");
?>
