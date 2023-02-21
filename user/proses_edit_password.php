<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

if (isset($_POST['newpass'])) {
    $new_password = password_hash($_POST['newpass'], PASSWORD_DEFAULT, array('10'));
    $id           = $_SESSION['id_client'];
    $sql          = "UPDATE tb_client SET password = '$new_password' WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
