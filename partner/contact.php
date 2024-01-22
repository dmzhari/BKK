<?php
include '../inc/function.database.php';
include '../inc/function.default.php';

cek_session('id_partner', 'partner', '../user/login');

$id   = $_SESSION['id_partner'];
<<<<<<< HEAD
$user = myquery("SELECT * FROM tb_client WHERE id = '$id'");
=======
$user = myquery("SELECT * FROM tb_partner WHERE id = '$id'");
>>>>>>> 1c7f353865203a96dfa2a14615508c596a98c163

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

    <!-- Page Wrapper -->,
    <div id="wrapper">

        <?php include 'inc/header.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Contact Service BKK</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kontak Kami</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 pt-3">
                                <h5>
                                    <i class="fas fa-home"></i>
                                    Alamat
                                </h5>
                                <p>Jl. Raya Batujajar No.30, Giriasih, Kec. Batujajar, Kabupaten Bandung Barat, Jawa Barat 40553</p>
                            </div>
                            <div class="col-md-12 pt-3">
                                <h5>
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </h5>
                                <p>
                                    <a href="mailto:bkksmkmahardhika@yahoo.com">
                                        bkksmkmahardhika@yahoo.com
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-12 pt-3">
                                <h5>
                                    <i class="fas fa-phone"></i>
                                    Nomor telp
                                </h5>
                                <p>081214698343</p>
                            </div>
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
                <span>Copyright &copy; BKK SMK Mahardhika <?= date("Y") ?></span>
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

</body>

</html>