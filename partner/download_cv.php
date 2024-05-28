<?php
require_once '../inc/function.database.php';
require_once '../inc/function.default.php';
include "../vendor/tecnickcom/tcpdf/tcpdf.php";

cek_session('id_partner', 'partner', '../user/login');

if (isset($_GET['id_pel'])) {
    $id = intval($conn->real_escape_string($_GET['id_pel']));
    $sql = myquery("SELECT cv FROM tb_client WHERE id = '$id'");
    $file = "../user/img/cv/" . $sql[0]['cv'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
