<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

$judul_loker = $conn->real_escape_string($_POST['judul_loker']);
$posisi_loker = $conn->real_escape_string($_POST['posisi_loker']);
$penempatan_job = $conn->real_escape_string($_POST['penempatan_job']);
$syarat_job = $conn->real_escape_string($_POST['syarat_job']);
$tanggal_kadaluarsa = $conn->real_escape_string($_POST['tanggal_kadaluarsa']);
$id_user = $_SESSION['id_partner'];
$path = empty($_POST['path']) ? null : $_POST['path'];
$image_ext = array('jpg', 'jpeg', 'png');
$ext = end(explode('.', addslashes(htmlspecialchars(trim($_FILES['foto_pengumuman']['name'])))));
$id_loker = $conn->real_escape_string($_POST['id']);
$act = $conn->real_escape_string($_POST['act']);

if ($act == 'tambah_data') {
    if (in_array($ext, $image_ext)) {
        $name = md5(rand()) . '.' . $ext;
        $location = "img/$path" . $name;
        if (move_uploaded_file($_FILES["foto_pengumuman"]["tmp_name"], $location)) {
            $conn->query("INSERT INTO tb_loker (judul_loker, posisi_loker, penempatan_job, syarat_job, tanggal_kadaluarsa, foto_pengumuman, id_user) VALUES ('$judul_loker', '$posisi_loker', '$penempatan_job', '$syarat_job', '$tanggal_kadaluarsa', '$name','$id_user')");
            echo 'success';
        } else {
            echo 'failed';
        }
    } else {
        echo 'file not image';
    }
} else if ($act == 'edit_data') {
    $deletefile = myquery("SELECT * FROM tb_loker WHERE id_loker = '$id_loker'");
    unlink("./img/foto_loker/" . $deletefile[0]['foto_pengumuman']);
    if (in_array($ext, $image_ext)) {
        $name = md5(rand()) . '.' . $ext;
        $location = "img/$path" . $name;
        if (move_uploaded_file($_FILES["foto_pengumuman"]["tmp_name"], $location)) {
            $sql = "UPDATE tb_loker SET judul_loker = '$judul_loker', posisi_loker = '$posisi_loker', 
            penempatan_job = '$penempatan_job', syarat_job = '$syarat_job', 
            tanggal_kadaluarsa = '$tanggal_kadaluarsa', foto_pengumuman = '$name',
            id_user = '$id_user' WHERE id_loker = '$id_loker'";
            $conn->query($sql);
            echo 'success';
        } else {
            echo 'failed';
        }
    } else {
        echo 'file not image';
    }
} else {
    if (isset($_GET['id'])) {
        $id = $conn->real_escape_string($_GET['id']);
        $sql = "DELETE FROM tb_loker WHERE id_loker = '$id'";
        $deletefile = myquery("SELECT * FROM tb_loker WHERE id_loker = '$id'");
        if ($conn->query($sql)) {
            unlink("./img/foto_loker/" . $deletefile[0]['foto_pengumuman']);
            header("Location: ./loker?hapus");
        }
    }
}
