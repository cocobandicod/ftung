<?php
require_once('../../config/koneksi.php');
require_once('../../config/menu.php');
require_once('../../config/cek_akses.php');
if (!empty($_SESSION)) {
} else {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = md5(uniqid(rand(), TRUE));
}
cek_login_akses($proses, $url2, @$_SESSION['kode_user'], @$_SESSION['token']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrator Fakultas Teknik Universitas Negeri Gorontalo</title>
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

    <!-- Main navbar -->
    <?= navbar($url2); ?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">


                <!-- Main navigation -->
                <?= menu($proses, $url2); ?>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                <div class="page-header page-header-light shadow">
                    <div class="page-header-content d-lg-flex">
                        <div class="d-flex">
                            <h4 class="page-title mb-0">
                                <?= str_replace('-', ' ', $_GET['judul']); ?>
                            </h4>
                        </div>

                    </div>

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Sitemap -->
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="mb-3">
                                        <h6>Selamat Datang</h6>
                                        <?php
                                        if ($_SESSION['level'] == 'Admin') {
                                        ?>
                                            <div class="row row-tile g-0">
                                                <div class="col">
                                                    <a href="<?= $url2 ?>beranda" class="btn btn-light w-100 flex-column rounded-0 rounded-top-start py-2">
                                                        <i class="ph-house text-info ph-2x mb-1"></i>
                                                        Beranda
                                                    </a>

                                                    <a href="<?= $url2 ?>galeri" class="btn btn-light w-100 flex-column rounded-0 rounded-bottom-start py-2">
                                                        <i class="ph-image text-info ph-2x mb-1"></i>
                                                        Galeri
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="<?= $url2 ?>profil" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-cards text-info ph-2x mb-1"></i>
                                                        Profil
                                                    </a>

                                                    <a href="<?= $url2 ?>link/terkait" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-link-simple text-info ph-2x mb-1"></i>
                                                        Link Terkait
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="<?= $url2 ?>berita" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-newspaper-clipping text-info ph-2x mb-1"></i>
                                                        Berita
                                                    </a>

                                                    <a href="<?= $url2 ?>sistem/informasi" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-laptop text-info ph-2x mb-1"></i>
                                                        Sistem Informasi
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="<?= $url2 ?>layanan" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-handshake text-info ph-2x mb-1"></i>
                                                        Layanan
                                                    </a>

                                                    <a href="<?= $url2 ?>agenda" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-calendar-check text-info ph-2x mb-1"></i>
                                                        Agenda
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="<?= $url2 ?>informasi" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-info text-info ph-2x mb-1"></i>
                                                        Informasi
                                                    </a>

                                                    <a href="<?= $url2 ?>sertifikat" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-shield-star text-info ph-2x mb-1"></i>
                                                        Sertifikat
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="<?= $url2 ?>informasi/beranda" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-notepad text-info ph-2x mb-1"></i>
                                                        Informasi Beranda
                                                    </a>

                                                    <a href="<?= $url2 ?>kritik/saran" class="btn btn-light w-100 flex-column rounded-0 py-2">
                                                        <i class="ph-speaker-high text-info ph-2x mb-1"></i>
                                                        Kritik & Saran
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a href="<?= $url2 ?>banner" class="btn btn-light w-100 flex-column rounded-0 rounded-top-end py-2">
                                                        <i class="ph-flag-banner text-info ph-2x mb-1"></i>
                                                        Banner
                                                    </a>

                                                    <a href="<?= $url2 ?>pengaturan" class="btn btn-light w-100 flex-column rounded-0 rounded-bottom-end py-2">
                                                        <i class="ph-wrench text-info ph-2x mb-1"></i>
                                                        Pengaturan
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /sitemap -->

                </div>
                <!-- /content area -->


                <!-- Footer -->
                <div class="navbar navbar-sm navbar-footer border-top">
                    <div class="container-fluid">
                        <span>&copy; <?= date('Y'); ?> <a href="#">Fakultas Teknik Universitas Negeri Gorontalo</a></span>
                    </div>
                </div>
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>