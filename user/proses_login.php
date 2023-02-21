<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

if (isset($_POST['email'])) {
    $email  = $conn->real_escape_string($_POST['email']);
    $pass   = $conn->real_escape_string($_POST['password']);
    $level  = $conn->real_escape_string($_POST['level']);

    if ($level == 'partner') {
        $check = myquery("SELECT * FROM tb_partner WHERE email = '$email'");
    } else {
        $check  = myquery("SELECT * FROM tb_client WHERE email = '$email'");
    }

    if (empty($check)) {
        echo 'no data';
    } else {
        if (password_verify($pass, $check[0]['password'])) {
            $level == 'partner' ? $_SESSION['id_partner'] = $check[0]['id'] : $_SESSION['id_client'] = $check[0]['id'];
            $_SESSION['level'] = $check[0]['level'];
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}
