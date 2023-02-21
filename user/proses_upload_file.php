<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

// Id User
$id          = $_SESSION['id_client'];
// Valid Image Extension
$image_ext   = array('jpg', 'jpeg', 'png');

if (isset($_FILES['file'])) {
    // Folder Location
    $path        = empty($_POST['path']) ? null : $_POST['path'];

    // file ext
    $ext         = end(explode('.', addslashes(htmlspecialchars(trim($_FILES['file']['name'])))));

    if (in_array($ext, $image_ext)) {
        $name   = md5(rand()) . '.' . $ext;
        $location = "img/$path" . $name;
        if ($_POST['act'] == 'cv') {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                $conn->query("UPDATE tb_client SET cv = '$name'");
                echo 'success';
            } else {
                echo 'failed';
            }
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                $conn->query("UPDATE tb_client SET foto = '$name' WHERE id = '$id'");
                echo 'success';
            } else {
                echo 'failed';
            }
        }
    } else {
        echo 'file not image';
    }
} else if (isset($_FILES['ktp']) || isset($_FILES['kk'])) {
    $extktp         = end(explode('.', addslashes(htmlspecialchars(trim($_FILES['ktp']['name'])))));
    $extkk          = end(explode('.', addslashes(htmlspecialchars(trim($_FILES['kk']['name'])))));
    $namektp        = md5(rand()) . '.' . $extktp;
    $namekk         = md5(rand()) . '.' . $extkk;
    $locationkk     = "img/kk/" . $namekk;
    $locationktp    = "img/ktp/" . $namektp;

    if (in_array($extktp, $image_ext) && in_array($extkk, $image_ext)) {
        move_uploaded_file($_FILES["ktp"]["tmp_name"], $locationktp);
        move_uploaded_file($_FILES["kk"]["tmp_name"], $locationkk);

        $conn->query("UPDATE tb_client SET ktp = '$namektp', kk = '$namekk' WHERE id = '$id'");
        if ($conn) {
            echo 'success';
        } else {
            echo 'failed';
        }
    } else {
        echo 'file not image';
    }
}
