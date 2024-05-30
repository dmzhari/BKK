<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

// Id User
$id = $_SESSION['id_client'];

// Valid Image Extension
$image_ext = array('jpg', 'jpeg', 'png');

if (isset($_FILES['file'])) {
    // Folder Location
    $path = empty($_POST['path']) ? null : $_POST['path'];

    // file ext
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (in_array($ext, $image_ext)) {
        $name = md5(rand()) . '.' . $ext;
        $location = "img/$path" . $name;
        $deletefile = myquery("SELECT foto,cv FROM tb_client WHERE id = '$id'");
        if ($_POST['act'] == 'cv') {
            unlink("./img/cv/" . $deletefile[0]['cv']);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                $conn->query("UPDATE tb_client SET cv = '$name'");
                echo 'success';
            } else {
                echo 'failed';
            }
        } else {
            unlink("./img/" . $deletefile[0]['foto']);
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
    $extktp = pathinfo($_FILES['ktp']['name'], PATHINFO_EXTENSION);
    $extkk = pathinfo($_FILES['kk']['name'], PATHINFO_EXTENSION);
    $namektp = md5(rand()) . '.' . $extktp;
    $namekk = md5(rand()) . '.' . $extkk;
    $locationkk = "img/kk/" . $namekk;
    $locationktp = "img/ktp/" . $namektp;
    $deletefile = myquery("SELECT ktp,kk FROM tb_client WHERE id = '$id'");


    if (in_array($extktp, $image_ext) && in_array($extkk, $image_ext)) {
        unlink("./img/ktp/" . $deletefile[0]['ktp']);
        unlink("./img/kk/" . $deletefile[0]['kk']);
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