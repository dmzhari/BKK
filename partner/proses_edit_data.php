<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

if (isset($_POST['username'])) {
    $id = $conn->real_escape_string($_POST['id_user']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $nama_perusahaan = $conn->real_escape_string($_POST['nama_perusahaan']);
    $tentang_perusahaan = $conn->real_escape_string($_POST['tentang_perusahaan']);
    $alamat_perusahaan = $conn->real_escape_string($_POST['alamat_perusahaan']);
    $nik = $conn->real_escape_string($_POST['nik']);
    $nowa = $conn->real_escape_string($_POST['nowa']);

    $sql = "UPDATE tb_partner SET username = '$username', email = '$email',
            nama_perusahaan ='$nama_perusahaan', nowa = '$nowa',
            tentang_perusahaan = '$tentang_perusahaan', alamat_perusahaan = '$alamat_perusahaan',
            nik = '$nik' WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
