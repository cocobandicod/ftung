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
    <script src="<?= $url2; ?>assets/js/jquery/jquery.min.js"></script>
    <script src="<?= $url2; ?>assets/js/vendor/tables/datatables/datatables.min.js"></script>
    <script src="<?= $url2; ?>assets/js/vendor/notifications/noty.min.js"></script>
    <script src="<?= $url2; ?>assets/js/vendor/notifications/sweet_alert.min.js"></script>

    <script src="<?= $url2; ?>assets/js/app.js"></script>
    <script src="<?= $url2; ?>assets/js/ajax.js"></script>
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
                                <?= ucwords(str_replace('-', ' ', $_GET['judul'])); ?>
                            </h4>
                        </div>

                    </div>

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Sitemap -->
                    <div class="card">
                        <!--
                        <div class="card-header d-sm-flex align-items-sm-center py-sm-0">
                            <h5 class="py-sm-2 my-sm-1"><?= ucwords(str_replace('-', ' ', $_GET['judul'])); ?></h5>
                            
                            <div class="mt-2 mt-sm-0 ms-sm-auto">
                                <a href="<?= $url2; ?>profil/add" class="btn btn-success btn-sm">
                                    <i class="ph-plus-circle ph-sm me-2"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        -->
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <table id="DTable" class="table datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jurusan</th>
                                                <th>Seo</th>
                                                <th>Link</th>
                                                <th>Doctoral</th>
                                                <th>Magister</th>
                                                <th>Mahasiswa</th>
                                                <th>Alumni</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
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

<script>
    const swalInit = swal.mixin({
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-light',
            denyButton: 'btn btn-light',
            input: 'form-control'
        }
    });

    var datatable
    $(document).ready(function() {
        datatable = $('.datatable-basic').DataTable({
            stateSave: true,
            autoWidth: false,
            processing: true,
            ordering: false,
            responsive: true,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span class="me-1">Cari:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="ph-magnifying-glass opacity-50"></i></div></div>',
                searchPlaceholder: 'Masukan Kata Kunci...',
                lengthMenu: '<span class="me-1">Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': document.dir == "rtl" ? '&larr;' : '&rarr;',
                    'previous': document.dir == "rtl" ? '&rarr;' : '&larr;'
                }
            },
            columnDefs: [{
                    className: 'text-center',
                    width: '2%',
                    targets: [0]
                },
                {
                    className: 'text-center',
                    width: '3%',
                    targets: [8]
                },
            ],
            "ajax": {
                url: "<?= $url2; ?>tabel/jurusan",
                type: "post"
            }
        });
    });
</script>

</html>