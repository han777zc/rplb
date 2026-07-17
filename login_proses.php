<?php
// Selalu gunakan session_start() di paling atas sebelum ada output HTML
session_start();

// ... (Proses cek username & password ke database kamu) ...

if ($login_berhasil) {
    // Menyimpan status login dan data user ke session
    $_SESSION['status_login'] = true;
    $_SESSION['user_username'] = $username; // Opsional, jika ingin menampilkan nama user

    // Alihkan halaman ke dashboard
    header("Location: dashboard.php");
    exit();
} else {
    echo "Username atau password salah!";
}
?>