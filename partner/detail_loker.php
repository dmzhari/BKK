<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

$id = $_SESSION['id_partner'];
$id_loker = intval($conn->real_escape_string($_GET['id']));
$user = myquery("SELECT * FROM tb_partner WHERE id = '$id'");
$dataloker = myquery("SELECT * FROM tb_loker WHERE id_loker = '$id_loker'");
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/datatables/dataTables.bootstrap4.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'inc/header.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Loker BKK</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-header text-center pb-0">
                            <h5>Foto Brosur</h5>
                        </div>
                        <img class="card-img-top img-fluid px-3 px-sm-4 mt-3 mb-4"
                            src="<?= base_url() ?>img/foto_loker/<?= $dataloker[0]['foto_pengumuman'] ?>"
                            alt="Foto Brosur">
                        <div class="card-body text-center">
                            <h5 class="card-title text-uppercase">
                                Tanggal Kadaluarsa Loker
                            </h5>
                            <p class="card-text text-capitalize">
                                <?= $dataloker[0]['tanggal_kadaluarsa'] ?>
                            </p>
                            <button class="btn btn-sm btn-primary form-control mb-3" type="button" data-toggle="modal"
                                data-target="#gantibrosur">Ganti Foto
                                Brosur</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-4">
                    <div class="card card-body">
                        <div class="form-group">
                            <label for="judul">Judul Loker</label>
                            <textarea class="form-control text-capitalize" rows="3" id="judul"
                                disabled><?= $dataloker[0]['judul_loker'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi Yang Dibutuhkan</label>
                            <p class="form-control text-capitalize" id="posisi">
                                <?= $dataloker[0]['posisi_loker'] ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="penempatan">Penempatan Loker</label>
                            <p class="form-control text-capitalize" id="penempatan">
                                <?= $dataloker[0]['penempatan_job'] ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="syarat_job">Persyaratan / Deskripsi Job</label>
                            <textarea class="form-control text-capitalize" rows="5" id="syarat_job"
                                disabled><?= $dataloker[0]['syarat_job'] ?></textarea>
                        </div>
                        <a class="btn btn-sm btn-success form-control mb-3" href="edit_loker?id=<?= $id_loker ?>">Edit
                            Data</a>
                        <a class="btn btn-sm btn-primary form-control" href="loker">Kembali</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="gantibrosur" tabindex="-1" aria-labelledby="gantibrosurLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gantibrosurLabel">Upload Foto Brosur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_foto">
                                <label class="custom-file-label" for="file_foto">Upload Foto</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="submit" class="btn btn-primary">Submit</button>
                        </div>
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
                <span>Copyright &copy; BKK SMK Mahardhika
                    <?= date("Y") ?>
                </span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Sweet2Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $(".custom-file-input").on("change", function () {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $("#submit").click(function () {
                if ($('#file_foto').prop('files')[0] === undefined) {
                    swal.fire({
                        icon: 'error',
                        text: 'File Belum di Upload'
                    });
                }
                let fd = new FormData();
                fd.append("foto_pengumuman", $('#file_foto').prop('files')[0]);
                fd.append("act", "edit_data");
                fd.append("id", <?= $dataloker[0]['id_loker'] ?>);
                fd.append("path", "foto_loker/");

                $.ajax({
                    url: 'proses_loker',
                    type: 'POST',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Berhasil Dirubah'
                            });
                            window.location.reload()
                        }
                    }
                });
            });
        })
    </script>
</body>

</html>