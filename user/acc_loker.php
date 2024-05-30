<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

if (isset($_POST['id_loker'])) {
    $id_loker = intval($conn->real_escape_string($_POST['id_loker']));
    $id_user = intval($conn->real_escape_string($_POST['id_user']));
    $id_partner = intval($conn->real_escape_string($_POST['id_partner']));
    $checkexist = myquery("SELECT * FROM tb_pelamar WHERE id_loker = '$id_loker' and id_client = '$id_user'");
    if (empty($checkexist)) {
        $sql = "INSERT INTO tb_pelamar (id_loker, id_client, id_partner) 
        VALUES ('$id_loker', '$id_user', '$id_partner')";
        if ($conn->query($sql)) {
            echo "success";
        } else {
            echo "gagal";
        }
    } else {
        echo "Sudah Pernah";
    }
}