<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

$id   = $_SESSION['id_partner'];
$user = myquery("SELECT * FROM tb_partner WHERE id = '$id'");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BKK SMK Mahardhika Batujajar">
    <meta name="author" content="dmzhari">

    <title>Partner Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'inc/header.php' ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Account Profile</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <img class="card-img-top img-fluid px-3 px-sm-4 mt-3 mb-4" src="<?= base_url() ?>img/<?= $user[0]['foto'] ?>" alt="Foto <?= $user[0]['username'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title text-uppercase"><?= $user[0]['nama_lengkap'] ?></h5>
                            <p class="card-text text-capitalize"><?= $user[0]['level'] ?></p>
                            <a class="btn btn-sm btn-success form-control" href="#" data-toggle="modal" data-target="#uploadModal">
                                Ganti Foto
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-4">
                    <div class="card card-body">
                        <div class="form-group">
                            <label for="nickname">Nama Lengkap</label>
                            <input class="form-control text-capitalize" id="nickname" type="text" value="<?= $user[0]['nama_lengkap'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tempat, Tgl Lahir</label>
                            <input class="form-control" type="text" id="tgl" value="<?= $user[0]['tempat_lahir'] ?>, <?= $user[0]['tanggal_lahir'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input class="form-control" type="text" id="nik" value="<?= $user[0]['nik'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nowa">No Whatsapp</label>
                            <input class="form-control" type="text" id="nowa" value="<?= $user[0]['nowa'] ?>" disabled>
                        </div>
                        <a class="btn btn-sm btn-primary form-control mb-3" href="edit_data_profile.php">Edit Data</a>
                        <a class="btn btn-sm btn-success form-control" href="upload_cv.php">Upload CV</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; BKK SMK Mahardhika <?= date("Y") ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Upload Foto Modal-->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file_foto" name="myimage">
                        <label class="custom-file-label" for="file_foto">Upload Foto</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="sub">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klick "logout" jika anda sudah yakin</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins
    <script src="<?= base_url() ?>vendor/chart.js/Chart.min.js"></script>

    Page level custom scripts
    <script src="<?= base_url() ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>js/demo/chart-pie-demo.js"></script> -->

    <!-- Sweet2Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $(".custom-file-input").on("change", function() {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $('#sub').click(function() {
                let foto = $('#file_foto').prop('files')[0];
                let fd = new FormData();

                if (foto != undefined) {
                    fd.append("file", foto);

                    $.ajax({
                        url: 'proses_upload_file',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == 'success') {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Upload Berhasil!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else if (data == 'file not image') {
                                swal.fire({
                                    icon: 'error',
                                    title: 'File Harus Bertipe Gambar!'
                                });
                            } else {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Upload Gagal!'
                                });
                            }
                        }
                    });
                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'File Belum Di Upload!'
                    });
                }
            });
        });
    </script>
</body>

</html>