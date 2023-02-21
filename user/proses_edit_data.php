<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

if (isset($_POST['username'])) {
    $id             = $conn->real_escape_string($_POST['id_user']);
    $username       = $conn->real_escape_string($_POST['username']);
    $email          = $conn->real_escape_string($_POST['email']);
    $jk             = $conn->real_escape_string($_POST['jenis_kelamin']);
    $nama_lengkap   = $conn->real_escape_string($_POST['nama_lengkap']);
    $nik            = $conn->real_escape_string($_POST['nik']);
    $nowa           = $conn->real_escape_string($_POST['nowa']);
    $tanggal_lahir  = $conn->real_escape_string($_POST['tanggal_lahir']);
    $tempat_lahir   = $conn->real_escape_string($_POST['tempat_lahir']);
    $pendidikan     = $conn->real_escape_string($_POST['pendidikan']);
    $asal_sekolah   = $conn->real_escape_string($_POST['asal_sekolah']);
    $usia           = $conn->real_escape_string($_POST['usia']);
    $jurusan        = $conn->real_escape_string($_POST['jurusan']);
    $pekerjaan      = $conn->real_escape_string($_POST['pekerjaan_terakhir']);
    $tinggi_badan   = $conn->real_escape_string($_POST['tinggi_badan']);
    $berat_badan    = $conn->real_escape_string($_POST['berat_badan']);

    $sql = "UPDATE tb_client SET username = '$username', email = '$email',
            nama_lengkap ='$nama_lengkap', jk = '$jk', nowa = '$nowa',
            pendidikan = '$pendidikan', asal_sekolah = '$asal_sekolah',
            tanggal_lahir = '$tanggal_lahir', tempat_lahir = '$tempat_lahir',
            usia = '$usia', jurusan = '$jurusan', pekerjaan_terakhir = '$pekerjaan',
            tinggi_badan = '$tinggi_badan', berat_badan = '$berat_badan',
            nik = '$nik' WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
