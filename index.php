<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Upload</title>
</head>
<body>
    <h1>Upload Excel Sheet for Products</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="excel_file" accept=".xlsx,.xls,.csv" required>
        <button type="submit">Upload</button>
    </form>
    <br>
    <a href="crud.php">Manage Products</a>
</body>
</html>
// <?php
// require "config.php";

// $error = "";

// // Agar already login hai, redirect to dashboard
// if (isset($_SESSION['user'])) {
//     header("Location: dashboard.php");
//     exit;
// }

// // Form submit check
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $username = trim($_POST['username']);
//     $password = $_POST['password'];

//     // PDO prepared statement
//     $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
//     $stmt->execute([$username]);
//     $user = $stmt->fetch();

//     if ($user && password_verify($password, $user['password'])) {
//         $_SESSION['user'] = $username;
//         header("Location: dashboard.php");
//         exit;
//     } else {
//         $error = "Invalid username or password";
//     }
// }
// ?>

// <!DOCTYPE html>
// <html lang="en">
// <head>
// <meta charset="UTF-8">
// <meta name="viewport" content="width=device-width, initial-scale=1.0">
// <title>Login | Dizihal</title>
// <style>
// body{
//     font-family: Arial, sans-serif;
//     background: linear-gradient(135deg,#667eea,#764ba2);
//     height: 100vh;
//     display: flex;
//     justify-content: center;
//     align-items: center;
//     margin:0;
// }
// .login-box{
//     background:#fff;
//     padding:30px;
//     width:100%;
//     max-width:380px;
//     border-radius:10px;
//     box-shadow:0 10px 30px rgba(0,0,0,0.2);
// }
// .login-box h2{
//     text-align:center;
//     margin-bottom:20px;
//     color:#333;
// }
// .input-group{
//     margin-bottom:15px;
// }
// .input-group label{
//     font-size:14px;
//     color:#555;
// }
// .input-group input{
//     width:100%;
//     padding:10px;
//     margin-top:5px;
//     border-radius:5px;
//     border:1px solid #ccc;
//     outline:none;
// }
// .input-group input:focus{
//     border-color:#667eea;
// }
// button{
//     width:100%;
//     padding:12px;
//     background:#667eea;
//     color:#fff;
//     border:none;
//     border-radius:5px;
//     font-size:16px;
//     cursor:pointer;
// }
// button:hover{
//     background:#5a67d8;
// }
// .error{
//     background:#ffe6e6;
//     color:#c53030;
//     padding:10px;
//     border-radius:5px;
//     margin-bottom:15px;
//     text-align:center;
//     font-size:14px;
// }
// .links{
//     text-align:center;
//     margin-top:10px;
// }
// .links a{
//     color:#667eea;
//     text-decoration:none;
//     margin:0 8px;
// }
// .links a:hover{
//     text-decoration:underline;
// }
// </style>
// </head>
// <body>

// <div class="login-box">
//     <h2>Admin Login</h2>

//     <?php if($error): ?>
//         <div class="error"><?= htmlspecialchars($error) ?></div>
//     <?php endif; ?>

//     <form method="post">
//         <div class="input-group">
//             <label>Username</label>
//             <input type="text" name="username" placeholder="Enter username" required>
//         </div>

//         <div class="input-group">
//             <label>Password</label>
//             <input type="password" name="password" placeholder="Enter password" required>
//         </div>

//         <button type="submit">Login</button>
//     </form>

//     <div class="links">
//         <a href="register.php">Create Account</a> |
//         <a href="forgot_password.php">Forgot Password?</a>
//     </div>
// </div>

// </body>
// </html>
