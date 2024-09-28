<?php
require_once('../../config/koneksi.php');
if (!empty($_SESSION)) {
} else {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = md5(uniqid(rand(), TRUE));
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <title>Login Administrator Fakultas Teknik Universitas Negeri Gorontalo</title>
    <link rel="shortcut icon" href="<?= $url2; ?>assets/images/icon.png">
    <!-- Global stylesheets -->
    <link href="<?= $url2; ?>assets/fonts/inter/inter.css" rel="stylesheet" type="text/css">
    <link href="<?= $url2; ?>assets/icons/phosphor/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $url2; ?>assets/css/ltr/all.min.css" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?= $url2; ?>assets/demo/demo_configurator.js"></script>
    <script src="<?= $url2; ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?= $url2; ?>assets/js/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    <!-- Login form -->
                    <form method="POST" id="login">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center mb-1 mt-2">
                                        <img src="<?= $url2; ?>assets/images/logo.png" alt="">
                                    </div>
                                    <h6 class="mb-0">Fakultas Teknik<br>Universitas Negeri Gorontalo</h6>
                                    <span class="d-block text-muted">Login Administrator</span>
                                </div>
                                <div class="alert alert-success text-center mb-2" id="pesan_sukses" style="display:none;"></div>
                                <div class="alert alert-danger text-center mb-2" id="pesan_gagal" style="display:none;"></div>
                                <div class="mb-1">
                                    <label class="form-label">Username</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-user-circle text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" id="tblmasuk" class="btn btn-yellow w-100">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <script src="<?= $url2; ?>assets/js/jquery/jquery.min.js"></script>
    <script src="<?= $url2; ?>assets/js/ajax.js"></script>
    <script src="<?= $url2; ?>assets/js/ceklogin.js"></script>

</body>

</html>