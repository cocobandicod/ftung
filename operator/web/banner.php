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
                        <div class="card-header d-sm-flex align-items-sm-center py-sm-0">
                            <h5 class="py-sm-2 my-sm-1"><?= ucwords(str_replace('-', ' ', $_GET['judul'])); ?></h5>
                            <div class="mt-2 mt-sm-0 ms-sm-auto">
                                <a href="<?= $url2; ?>banner/add" class="btn btn-success btn-sm">
                                    <i class="ph-plus-circle ph-sm me-2"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row pt-3">
                                <?php
                                $sql = $proses->tampil_data_select('*', 'banner', '1=1 ORDER BY urutan ASC');
                                foreach ($sql as $row) {
                                    if ($row['publish'] == 'Yes') {
                                        $publish = '<i class="ph-check-circle text-success me-2"></i>';
                                    } else {
                                        $publish = '<i class="ph-x-circle text-danger me-2"></i>';
                                    }
                                ?>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card">
                                            <div class="card-img-actions mx-1 mt-1">
                                                <img class="card-img img-fluid" src="<?= $url; ?>assets/images/banner/thumb_<?= $row['file']; ?>" alt="">
                                            </div>

                                            <div class="card-body">
                                                <div class="d-flex align-items-start flex-nowrap">
                                                    <div class="list-icons list-icons-extended ml-auto">
                                                        <a href="<?= $url2; ?>banner/edit/<?= $row['id']; ?>" class="list-icons-item"><i class="ph-note-pencil text-info me-2"></i></a>
                                                        <a href="#" id="del" data-id="<?= $row['id']; ?>" data-nama="<?= $row['file']; ?>" data-act="del" class="list-icons-item"><i class="ph-trash text-danger me-2"></i></a>
                                                        <?= $publish; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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

    $(document).on('click', '#del', function(e) {
        var nama = $(e.currentTarget).data('nama');
        var del = $(e.currentTarget).data('id');
        var act = $(e.currentTarget).data('act');
        swalInit.fire({
            title: 'Data yang dipilih ini akan dihapus ?',
            html: '<h5 class="mb-0">' + nama + '</h5>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="ph-trash me-1"></i> Hapus',
            cancelButtonText: '<i class="ph-x-circle me-1"></i> Batal',
            confirmButtonColor: "#DD6B55",
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            }
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    url: '<?= $url2; ?>proses/banner',
                    data: {
                        del: del,
                        act: act
                    },
                    success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        }, 2000)
                    }
                });
                swalInit.fire(
                    'Deleted!',
                    'Data berhasil dihapus.',
                    'success'
                );
            }
        });
    });
</script>

</html>