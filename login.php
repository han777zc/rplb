<?php
session_start();
require 'controller/controluser.php'; // Atau jika kode di atas digabung, sesuaikan require-nya

// Jika user sudah login, langsung lempar ke dashboard
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: dashboard.php"); 
    exit;
}

if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SUDAH DIPERBAIKI: Mengubah 'users' menjadi 'user' sesuai fungsi database Anda
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Cek apakah username terdaftar
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Cek password (plain text sesuai data di database Anda)
        if ($password === $row['password']) {
            // Set session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; 

            // Redirect instan ke dashboard setelah sukses login
            header("Location: dashboard.php"); 
            exit;
        }
    }
    
    // Jika salah, aktifkan flag error
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RPL B ADMIN XXI</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: #4e73df;
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .login-header p {
            color: #858796;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #4e73df;
            font-size: 14px;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d1d3e2;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #4e73df;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #4e73df;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-login:hover {
            background-color: #2e59d9;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <h2>RPL B ADMIN XXI</h2>
        <p>Silakan masuk ke akun Anda</p>
    </div>

    <?php if (isset($error)) : ?>
        <div class="alert-error">
            Username atau Password salah!
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username Anda..." autocomplete="off" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password Anda..." required>
        </div>

        <button type="submit" name="submit_login" class="btn-login">Login Sekarang</button>
    </form>
</div>

</body>
</html>