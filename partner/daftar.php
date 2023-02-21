<?php
include '../inc/function.database.php';
include '../inc/function.default.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="BKK HUBIN Mahardhika">
    <meta name="description" content="BKK SMK Mahardhika Batujajar">
    <meta name="keywords" content="BKK, Hubin, SMK Mahardhika Batujajar">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="author" content="dmzhari" />

    <title>Daftar BKK SMK Mahardhika</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar BKK SMK Mahardhika!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="username" placeholder="Username" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-sm-0">
                                        <select id="level" class="form-control" required>
                                            <option value="client">Client</option>
                                            <option value="partner">Partner</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ml-3">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="showpass">
                                        <label class="custom-control-label" for="showpass">Show Password</label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-user btn-block" id="sub">
                                    Daftar Akun
                                </button>
                                <hr>
                            </form>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot_password">Lupa Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="btn btn-primary small" href="login">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>

    <!-- Sweet2Alert JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#showpass').click(function(e) {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });

            $('#sub').click(function() {
                let email = $('#email').val();
                let username = $('#username').val();
                let password = $('#password').val();
                let level = $('#level').val();

                $.ajax({
                    url: 'proses_daftar',
                    type: 'POST',
                    data: {
                        "email": email,
                        "password": password,
                        "username": username,
                        "level": level
                    },
                    success: function(respone) {
                        if (respone === 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Berhasil Daftar!',
                                html: 'Anda akan dialihkan kehalaman <b>Login</b>!!',
                                timer: 2000,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        // b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                    window.location.href = 'login.php';
                                }
                            });
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: 'Gagal Daftar!'
                            });
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>