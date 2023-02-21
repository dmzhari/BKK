<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

if (isset($_POST['username'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email    = $conn->real_escape_string($_POST['email']);
    $level    = $conn->real_escape_string($_POST['level']);
    $hari_ini = date('Y-m-d');

    $hash     = password_hash($password, PASSWORD_DEFAULT, ['10']);

    if ($level == 'client') {
        $sql      = "INSERT INTO tb_client (username, password, email, tanggal_lahir, level, foto, cv, ktp, kk) VALUES (
                    '$username', '$hash', '$email', '$hari_ini','$level', 'logo_bkk.jpeg', 'example.jpg', 'ktp.png', 'kartu_keluarga.jpg'
                )";
    } else {
        $sql      = "INSERT INTO tb_partner (username, password, email, level, foto) VALUES (
                    '$username', '$hash', '$email', '$level', 'logo_bkk.jpeg'
                )";
    }

    if ($conn->query($sql)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
