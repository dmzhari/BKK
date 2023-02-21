<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

if (isset($_POST['newpass'])) {
    $new_password = password_hash($_POST['newpass'], PASSWORD_DEFAULT, array('10'));
    $id           = $_SESSION['id_partner'];
    $sql          = "UPDATE tb_partner SET password = '$new_password' WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
