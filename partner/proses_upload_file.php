<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

if (isset($_FILES['file'])) {
    // Id User
    $id          = $_SESSION['id_partner'];
    // Folder Location
    $path        = empty($_POST['path']) ? null : $_POST['path'];

    // Valid Image Extension
    $image_ext   = array('jpg', 'jpeg', 'png');

    // file ext
    $ext         = end(explode('.', addslashes(htmlspecialchars(trim($_FILES['file']['name'])))));

    if (in_array($ext, $image_ext)) {
        $name   = md5(rand()) . '.' . $ext;
        $location = "img/$path" . $name;
        if ($_POST['act'] == 'cv') {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                $conn->query("UPDATE tb_partner SET cv = '$name'");
                echo 'success';
            } else {
                echo 'failed';
            }
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                $conn->query("UPDATE tb_partner SET foto = '$name' WHERE id = '$id'");
                echo 'success';
            } else {
                echo 'failed';
            }
        }
    } else {
        echo 'file not image';
    }
}
