<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

$id = $_SESSION['id_partner'];
$user = myquery("SELECT * FROM tb_partner WHERE id = '$id'");
$dataloker = myquery("SELECT * FROM tb_loker WHERE id_loker = " . $conn->real_escape_string($_GET['id']));

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

    <!-- Datepicker -->
    <link rel="stylesheet" href="vendor/datepicker/css/bootstrap-datepicker.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'inc/header.php' ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Data Loker</h1>
            </div>

            <!-- Content Row -->
            <form id="editdata">
                <div class="row">
                    <input type="hidden" name="id_user" value="<?= $id ?>">
                    <div class="form-group col-md-4">
                        <label for="judul_loker">Judul Loker:</label>
                        <input type="text" class="form-control" id="judul_loker" name="judul_loker"
                            placeholder="Dibutuhkan Mekanik di Cimahi" value="<?= $dataloker[0]['judul_loker'] ?>"
                            required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="posisi_loker">Posisi Yang Dibutuhkan</label>
                        <input type="text" class="form-control" id="posisi_loker" name="posisi_loker"
                            placeholder="Mekanik, Admin Produksi" value="<?= $dataloker[0]['posisi_loker'] ?>" required>
                    </div>
                    <div class="form-group col-md-4 ">
                        <label for="penempatan">Penempatan Loker:</label>
                        <input type="text" class="form-control" id="penempatan" placeholder="Bandung, Cimahi"
                            value="<?= $dataloker[0]['penempatan_job'] ?>" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="file_foto">Upload Foto Pengumuman:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file_foto">
                            <label class="custom-file-label" for="file_foto">Upload Foto</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="syarat_job">Syarat Yang Dibutuhkan:</label>
                        <textarea class="form-control" rows="5" id="syarat_job" placeholder="Good Attitude"
                            required><?= $dataloker[0]['syarat_job'] ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
                        <input class="form-control" rows="3" id="tanggal_kadaluarsa"
                            value="<?= $dataloker[0]['tanggal_kadaluarsa'] ?>" required></input>
                    </div>
                    <button type="button" id="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </form>

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

    <!-- Sweet2Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page level plugins
    <script src="<?= base_url() ?>vendor/chart.js/Chart.min.js"></script>

    Page level custom scripts
    <script src="<?= base_url() ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>js/demo/chart-pie-demo.js"></script> -->

    <!-- Datepicker -->
    <script src="<?= base_url() ?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Custom Script -->
    <script>
        $(document).ready(function () {
            $(".custom-file-input").on("change", function () {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $('#tanggal_kadaluarsa').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                todayBtn: true,
                startDate: new Date(),
            });

            $('#submit').click(function () {
                if ($('#file_foto').prop('files')[0] === undefined) {
                    swal.fire({
                        icon: 'error',
                        text: 'File Belum di Upload'
                    });
                }
                let fd = new FormData();
                fd.append("foto_pengumuman", $('#file_foto').prop('files')[0]);
                fd.append("judul_loker", $('#judul_loker').val());
                fd.append("posisi_loker", $('#posisi_loker').val());
                fd.append("penempatan_job", $('#penempatan').val());
                fd.append("syarat_job", $('#syarat_job').val());
                fd.append("tanggal_kadaluarsa", $('#tanggal_kadaluarsa').val());
                fd.append("act", "edit_data");
                fd.append("id", <?= $dataloker[0]['id_loker'] ?>)
                fd.append("path", "foto_loker/")

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
            })
        })
    </script>
</body>

</html>