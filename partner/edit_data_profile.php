<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

$id = $_SESSION['id_partner'];
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
                <h1 class="h3 mb-0 text-gray-800">Edit Data Profile</h1>
            </div>

            <!-- Content Row -->
            <form id="editdata">
                <div class="row">
                    <input type="hidden" name="id_user" value="<?= $id ?>">
                    <div class="form-group col-md-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?= $user[0]['username'] ?>" placeholder="smkmahardhika" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= $user[0]['email'] ?>" placeholder="example@example.com" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nama_lengkap">Nama Lengkap Perusahaan:</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_perusahaan"
                            value="<?= $user[0]['nama_perusahaan'] ?>" placeholder="PT. Mahardhika Sejahtera" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nowa">No Telp Office / WA:</label>
                        <input type="text" class="form-control" id="nowa" name="nowa" value="<?= $user[0]['nowa'] ?>"
                            placeholder="0838xxxxxx" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tentang">Tentang Perusahaan:</label>
                        <textarea class="form-control" rows="3" id="tentang" name="tentang_perusahaan"
                            placeholder="SMK Mahardhika Batujajar"
                            required><?= $user[0]['tentang_perusahaan'] ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="alamat_per">Alamat Perusahaan:</label>
                        <textarea class="form-control" rows="3" id="alamat_per" name="alamat_perusahaan"
                            placeholder="SMK Mahardhika Batujajar"
                            required><?= $user[0]['alamat_perusahaan'] ?></textarea>
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
            let dataform = $('#editdata');

            $('#tgl').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });

            $('#submit').click(function () {
                $.ajax({
                    url: 'proses_edit_data',
                    type: 'POST',
                    data: dataform.serialize(),
                    success: function (data) {
                        if (data == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Berhasil Dirubah'
                            });
                            window.location.reload();
                        }
                    }
                });
            })
        })
    </script>
</body>

</html>