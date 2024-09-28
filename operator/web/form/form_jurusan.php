<?php
require_once('../../../config/koneksi.php');
require_once('../../../config/menu.php');
require_once('../../../config/cek_akses.php');
require_once('../../../config/fungsi_indotgl.php');
if (!empty($_SESSION)) {
} else {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = md5(uniqid(rand(), TRUE));
}
cek_login_akses($proses, $url2, @$_SESSION['kode_user'], @$_SESSION['token']);
cek_hak_akses($url, @$_SESSION['kode_user'], @$_SESSION['level'], 'Admin');
cek_url($url2, $proses, $_GET['act'], 'jurusan', 'id_jurusan = "' . @$_GET['id'] . '"');
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
                                <?= ucfirst($_GET['act']) . ' ' . str_replace('-', ' ', $_GET['judul']); ?>
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
                                <form method="post" id="form" class="form">
                                    <?php
                                    if ($_GET['act'] == 'edit') {
                                        $row = $proses->tampil_data_saja('*', 'jurusan', 'id_jurusan = ' . $_GET['id'] . '');
                                        echo '<input type="hidden" name="id_jurusan" value="' . $row['id_jurusan'] . '">';
                                        echo '<input type="hidden" name="act" value="edit">';
                                    } else {
                                        echo '<input type="hidden" name="act" value="add">';
                                    }
                                    ?>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Nama Jurusan</label>
                                            <div class="col-lg-4 mb-2">
                                                <input type="text" name="nama_jurusan" class="form-control" value="<?= @$row['nama_jurusan']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Seo</label>
                                            <div class="col-lg-4 mb-2">
                                                <input type="text" name="seo" class="form-control" value="<?= @$row['seo']; ?>">
                                                <small>URL jika jurusan mempunyai alamat web sendiri</small>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Link Sendiri</label>
                                            <div class="col-lg-2 mb-2">
                                                <?= publish('link', @$row['link']); ?>
                                            </div>
                                        </div>
                                        <h6>Rekapan Jumlah</h6>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Doctoral</label>
                                            <div class="col-lg-4 mb-2">
                                                <input type="number" name="doctoral" class="form-control" value="<?= @$row['doctoral']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Magister</label>
                                            <div class="col-lg-4 mb-2">
                                                <input type="number" name="magister" class="form-control" value="<?= @$row['magister']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Mahasiswa</label>
                                            <div class="col-lg-4 mb-2">
                                                <input type="number" name="mahasiswa" class="form-control" value="<?= @$row['mahasiswa']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Alumni</label>
                                            <div class="col-lg-4 mb-2">
                                                <input type="number" name="alumni" class="form-control" value="<?= @$row['alumni']; ?>" required>
                                            </div>
                                        </div>

                                        <button type="submit" id="simpan" class="btn btn-primary mt-2">
                                            <i class="ph-floppy-disk me-1"></i>
                                            Simpan
                                        </button>
                                        <button type="button" class="btn btn-link mt-2" onclick="history.back()" data-bs-dismiss="modal">Kembali</button>
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
    $(document).on('submit', '#form', function(event) {
        event.preventDefault();
        var form = $('#form')[0];
        var nilai = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '<?= $url2; ?>proses/jurusan',
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
                    text: '<h6><i class="ph-check-square me-1"></i> Data Berhasil Dimasukan!</h6>',
                    type: 'success',
                    theme: 'limitless',
                    layout: 'topRight',
                    timeout: 1000
                }).show(
                    setTimeout(function() {
                        window.location = "<?= $url2 ?>jurusan";
                    }, 2000)
                );
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                new Noty({
                    text: '<h6><i class="ph-x-circle me-1"></i> Data Gagal Dimasukan!</h6>',
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
    });
</script>

</html>