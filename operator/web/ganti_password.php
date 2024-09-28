<?php
require_once('../../config/koneksi.php');
require_once('../../config/menu.php');
require_once('../../config/cek_akses.php');
require_once('../../config/fungsi_indotgl.php');
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
                                        <h6><?= str_replace('-', ' ', $_GET['judul']); ?></h6>
                                    </div>
                                </div>
                                <form method="post" id="form" class="form" enctype="multipart/form-data">
                                    <?php
                                    $row = $proses->tampil_data_saja('*', 'operator', '1=1 AND id_operator = "' . $_SESSION['kode_user'] . '"');
                                    echo '<input type="hidden" name="id" value="' . $row['id_operator'] . '">';
                                    echo '<input type="hidden" name="act" value="edit">';
                                    ?>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="alert alert-danger" id="pesan1" style="display:none;"></div>
                                        <div class="alert alert-danger" id="pesan2" style="display:none;"></div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="row mb-0">
                                            <label class="col-lg-4 col-form-label">Password Lama</label>
                                            <div class="col-lg-8 mb-2">
                                                <input type="password" onchange="cek_pass()" id="pass_lama" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-4 col-form-label">Password Baru</label>
                                            <div class="col-lg-8 mb-2">
                                                <input type="password" name="pass_baru" id="pass_baru" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-4 col-form-label">Konfirmasi Password Baru</label>
                                            <div class="col-lg-8 mb-2">
                                                <input type="password" name="konf_pass" id="konf_pass" class="form-control" required>
                                            </div>
                                        </div>
                                        <button type="submit" id="simpan" class="btn btn-primary mt-2">
                                            <i class="ph-floppy-disk me-1"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </form>
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

    function cek_pass() {
        var pass_lama = $('#pass_lama').val();
        $.ajax({
            type: 'post',
            url: '<?= $url2; ?>proses/ganti/password',
            data: {
                pass_lama: pass_lama,
                act: 'cek'
            },
            success: function(data) {
                if (data == 0) {
                    $("#pesan1").fadeIn();
                    $("#pesan1").html('Password Lama Salah');
                    setTimeout(function() {
                        $("#pesan1").fadeOut();
                        $('#pass_lama').val('');
                    }, 2000); //will call the function after 2 secs.
                }
            },
        });
    }

    $(document).on('submit', '#form', function(event) {
        event.preventDefault();
        var pass_baru = $('#pass_baru').val();
        var konf_pass = $('#konf_pass').val();
        var form = $('#form')[0];
        var nilai = new FormData(form);
        if (konf_pass != pass_baru) {
            $("#pesan2").fadeIn();
            $("#pesan2").html('Password baru dan konfirmasi password tidak sama');
            setTimeout(function() {
                $("#pesan2").fadeOut();
                $('#konf_pass').val('');
            }, 2000); //will call the function after 2 secs.
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= $url2; ?>proses/ganti/password',
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data: nilai,
                beforeSend: function() {
                    document.querySelector('#simpan').innerHTML = '<i class="ph-spinner spinner"></i> Loading...';
                },
                success: function(data) {
                    new Noty({
                        text: '<h6><i class="ph-check-square me-1"></i> Password berhasil diubah!</h6>',
                        type: 'success',
                        theme: 'limitless',
                        layout: 'topRight',
                        timeout: 1000
                    }).show();
                    $('#pass_baru').val('');
                    $('#konf_pass').val('');
                    $('#pass_lama').val('');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    new Noty({
                        text: '<h6><i class="ph-x-circle me-1"></i> Password gagal diubah!</h6>',
                        type: 'error',
                        theme: 'limitless',
                        layout: 'topRight',
                        timeout: 1000
                    }).show();
                },
                complete: function(data) {
                    document.querySelector('#simpan').innerHTML = '<i class="ph-floppy-disk me-1"></i> Simpan';
                }
            });
        }
    });
</script>

</html>