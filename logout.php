<?php
// 1. Mulai session terlebih dahulu untuk mengakses session yang aktif
session_start();

// 2. Kosongkan semua variabel session
$_SESSION = array();

// 3. Jika ingin benar-benar bersih, hapus juga cookie session di browser
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Hancurkan/destroy session di server
session_destroy();

// 5. Alihkan user ke halaman login (atau index)
header("Location: login.php");
exit;