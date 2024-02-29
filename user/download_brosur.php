<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

$url = addslashes(htmlspecialchars(trim($conn->real_escape_string($_GET['url']))));

// Periksa apakah URL kosong atau null
if (!empty($url)) {
    // Inisialisasi cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    // Eksekusi cURL
    $file_content = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Tutup koneksi cURL
    curl_close($ch);

    // Periksa status HTTP
    if ($http_status == 200) {
        // Set header untuk mengunduh file
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($url) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($file_content));

        // Keluarkan konten file
        echo $file_content;
        exit;
    } else {
        // Handle kesalahan jika status HTTP bukan 200
        die('Tidak dapat mengunduh file. Status HTTP: ' . $http_status);
    }
} else {
    // Handle kesalahan jika URL kosong
    die('URL file tidak boleh kosong.');
}