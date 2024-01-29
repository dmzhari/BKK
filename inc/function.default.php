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
    if (!isset($_SESSION[$id]) && isset($_SESSION['level']) !== $level) {
        echo "<script>alert('Hayo mau ngapain :D'); window.location.href='$location';</script>";
        die();
    }
}

function base_url($includePath = true, $customPath = '')
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];

    if ($includePath) {
        $path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $isLocal = in_array($host, ['localhost', '127.0.0.1']);
        $port = $isLocal && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] !== '80' ? ":" . $_SERVER['SERVER_PORT'] : '';
        $path = $path !== '/' ? $path . '/' : '';
        $baseUrl = $protocol . "://" . $host . $port . $path;
    } else {
        $customPath = trim($customPath, '/');
        $baseUrl = $protocol . "://" . $host . '/' . $customPath;
    }

    return $baseUrl;
}
