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
    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'inc/header.php' ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Upload KTP dan Kartu Keluarga</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-body shadow">
                        <a href="<?= base_url() ?>/img/ktp/<?= $user[0]['ktp'] ?>" data-title="Foto KTP" data-max-height="400" data-toggle="lightbox">
                            <img class="img-fluid mt-3 mb-4 px-3 px-sm-4 col-md-5 offset-md-3" src="<?= base_url() ?>/img/ktp/<?= $user[0]['ktp'] ?>">
                        </a>
                        <p>*File harus bertipe jpg, jpeg, png</p>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="ktp" name="ktp">
                            <label class="custom-file-label" for="ktp">Upload File KTP</label>
                        </div>
                        <!-- <button class="btn btn-primary form-control" id="submit">Submit</button> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body shadow">
                        <a href="<?= base_url() ?>/img/kk/<?= $user[0]['kk'] ?>" data-title="Foto Kartu Keluarga" data-max-height="400" data-toggle="lightbox">
                            <img class="img-fluid mt-3 mb-4 px-3 px-sm-4 col-md-5 offset-md-3" src="<?= base_url() ?>/img/kk/<?= $user[0]['kk'] ?>">
                        </a>
                        <p>*File harus bertipe jpg, jpeg, png</p>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="kk" name="kk">
                            <label class="custom-file-label" for="kk">Upload File Kartu Keluarga</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary form-control col-md-8 mt-3 offset-md-2" id="submit">Submit</button>
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

    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

    <!-- Page level plugins
    <script src="<?= base_url() ?>vendor/chart.js/Chart.min.js"></script>

    Page level custom scripts
    <script src="<?= base_url() ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>js/demo/chart-pie-demo.js"></script> -->

    <!-- Sweet2Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true,
                showArrows: false,
                wrapping: false
            });
        });

        $(document).ready(function() {
            $(".custom-file-input").on("change", function() {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $('#submit').click(function() {
                let kk = $('#kk').prop('files')[0];
                let ktp = $('#ktp').prop('files')[0];
                let fd = new FormData();

                if (kk != undefined && ktp != undefined) {
                    fd.append("kk", kk);
                    fd.append("ktp", ktp);
                    // fd.append("file", '');
                    // fd.append("path", 'cv/');
                    fd.append("act", 'ktpkk');

                    $.ajax({
                        url: 'proses_upload_file',
                        method: 'POST',
                        data: fd,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            console.log(data);
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
                        title: 'File KK Atau KTP Belum Di Upload!'
                    });
                }
            });
        });
    </script>

</body>

</html>