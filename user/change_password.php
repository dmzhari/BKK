<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_client', 'client', 'login.php');

$id   = $_SESSION['id_client'];
$user = myquery("SELECT * FROM tb_client WHERE id = '$id'");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BKK SMK Mahardhika Batujajar">
    <meta name="author" content="dmzhari">

    <title>User Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card card-body">
                    <div class="form-group">
                        <div class="input-group is-invalid mb-3">
                            <input class="form-control" type="password" id="newpass" placeholder="Masukan Password Baru" required>
                            <div class="input-group-append">
                                <button class="btn fas fa-eye input-group-text bg-transparent" id="showpass"></i></button>
                            </div>
                        </div>
                        <button class="btn btn-primary form-control" id="sub">Submit</button>
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
        $(document).ready(function() {
            $('#showpass').click(function() {
                if ($(this).hasClass('fas fa-eye')) {
                    $('#newpass').attr('type', 'text');
                    $(this).removeClass('fas fa-eye');
                    $(this).addClass('fas fa-eye-slash');
                } else if ($(this).hasClass('fas fa-eye-slash')) {
                    $('#newpass').attr('type', 'password');
                    $(this).removeClass('fas fa-eye-slash');
                    $(this).addClass('fas fa-eye')
                }
            });

            $('#sub').click(function() {
                let newpass = $('#newpass').val();

                $.ajax({
                    url: 'proses_edit_password',
                    type: 'POST',
                    data: {
                        "newpass": newpass
                    },
                    success: function(data) {
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