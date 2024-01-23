<?php

function myquery($query)
{
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function cek_session($id, $level, $location)
{
    if (!isset($_SESSION[$id]) && isset($_SESSION['level']) != $level) {
        echo "<script>alert('Hayo mau ngapain :D')</script>";
        header("Location: $location");
        exit();
    }
}

function base_url()
{
    // Mendapatkan protokol (http atau https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

    // Mendapatkan domain atau host
    $host = $_SERVER['HTTP_HOST'];

    // Mendapatkan path (direktori) dari URL
    $path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    // Jika domain adalah "localhost" atau "127.0.0.1", tambahkan port jika ada
    $isLocal = in_array($host, ['localhost', '127.0.0.1']);
    $port = $isLocal && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] !== '80' ? ":" . $_SERVER['SERVER_PORT'] : '';

    // Tambahkan slash jika path tidak kosong
    $path = $path !== '/' ? $path . '/' : '';

    // Menggabungkan semua komponen untuk membentuk base URL
    $baseUrl = $protocol . "://" . $host . $port . $path;

    return $baseUrl;
}
