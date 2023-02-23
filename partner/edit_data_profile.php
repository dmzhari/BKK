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
                    <div class="form-group col-md-4">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user[0]['username'] ?>" placeholder="dmzhari" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user[0]['email'] ?>" placeholder="example@example.com" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jl">Jenis Kelamin:</label>
                        <select id="jl" class="form-control" name="jenis_kelamin" required>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 offset-md-1">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user[0]['nama_lengkap'] ?>" placeholder="Hari Permana" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nik">NIK:</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $user[0]['nik'] ?>" placeholder="3217xxxxxx" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nowa">No Whatsapp:</label>
                        <input type="text" class="form-control" id="nowa" name="nowa" value="<?= $user[0]['nowa'] ?>" placeholder="0838xxxxxx" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pendidikan">Pendidikan Terakhir:</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $user[0]['pendidikan'] ?>" placeholder="SMP" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tgl">Tanggal Lahir:</label>
                        <input type="text" class="form-control" id="tgl" name="tanggal_lahir" value="<?= $user[0]['tanggal_lahir'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="tgl" name="tempat_lahir" value="<?= $user[0]['tempat_lahir'] ?>" placeholder="Bandung" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="asal">Asal Sekolah:</label>
                        <input type="text" class="form-control" id="asal" name="asal_sekolah" value="<?= $user[0]['asal_sekolah'] ?>" placeholder="SMK Mahardhika Batujajar" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="usia">Usia:</label>
                        <input type="text" class="form-control" id="usia" name="usia" value="<?= $user[0]['usia'] ?>" placeholder="19" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jurusan">Jurusan:</label>
                        <select id="jurusan" class="form-control" name="jurusan" required>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                            <option value="AKL">Akutansi dan Keuangan Lembaga</option>
                            <option value="TP">Teknik Pemesinan</option>
                            <option value="TKR">Teknik Kendaraan Ringan</option>
                            <option value="TBSM">Teknik dan Bisnis Sepeda Motor</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 offset-md-1">
                        <label for="pekerjaan_terakhir">Pekerjaan Terakhir:</label>
                        <input type="text" class="form-control" id="pekerjaan_terakhir" name="pekerjaan_terakhir" value="<?= $user[0]['pekerjaan_terakhir'] ?>" placeholder="Operator Produksi" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tinggi_badan">Tinggi Badan:</label>
                        <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" value="<?= $user[0]['tinggi_badan'] ?>" placeholder="170" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="berat_badan">Berat Badan:</label>
                        <input type="text" class="form-control" id="berat_badan" name="berat_badan" value="<?= $user[0]['berat_badan'] ?>" placeholder="50" required>
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
            let dataform = $('#editdata');

            $('#tgl').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });

            $('#submit').click(function() {
                $.ajax({
                    url: 'proses_edit_data',
                    type: 'POST',
                    data: dataform.serialize(),
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