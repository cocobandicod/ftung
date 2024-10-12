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
cek_url($url2, $proses, $_GET['act'], 'data_dosen', 'id_dosen = "' . @$_GET['id'] . '"');
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
    <script src="<?= $url; ?>config/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@2/dist/tinymce-jquery.min.js"></script>
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
                                <form method="post" id="form" class="form" enctype="multipart/form-data">
                                    <?php
                                    if ($_GET['act'] == 'edit') {
                                        $row = $proses->tampil_data_saja('*', 'data_dosen', 'id_dosen = ' . $_GET['id'] . '');
                                        echo '<input type="hidden" name="id" value="' . $row['id_dosen'] . '">';
                                        echo '<input type="hidden" name="act" value="edit">';
                                    } else {
                                        echo '<input type="hidden" name="act" value="add">';
                                    }
                                    ?>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <label class="form-label">Jurusan</label>
                                                <?php
                                                if ($_SESSION['level'] == 'Operator') {
                                                    jurusan2($proses, @$_SESSION['id_jurusan']);
                                                } else {
                                                    jurusan($proses, @$row['id_jurusan']);
                                                }
                                                ?>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label class="form-label">NIDN/NIP</label>
                                                <input type="text" name="nidn" class="form-control" value="<?= @$row['nidn']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label class="form-label">Nama Dosen</label>
                                            <input type="text" name="nama" class="form-control" value="<?= @$row['nama']; ?>" required>
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label class="form-label">Jabatan Akademik</label>
                                            <input type="text" name="jabatan_akademik" class="form-control" value="<?= @$row['jabatan_akademik']; ?>" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label">Gelar Akademik</label>
                                                <input type="text" name="gelar_akademik" class="form-control" value="<?= @$row['gelar_akademik']; ?>">
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label">ID Scholar</label>
                                                <input type="text" name="id_scholar" class="form-control" value="<?= @$row['id_scholar']; ?>">
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <label class="form-label">ID Sinta</label>
                                                <input type="number" name="id_sinta" class="form-control" value="<?= @$row['id_sinta']; ?>">
                                            </div>
                                        </div>
                                        <button type="submit" id="simpan" class="btn btn-primary mt-2">
                                            <i class="ph-floppy-disk me-1"></i>
                                            Simpan
                                        </button>
                                        <button type="button" class="btn btn-link mt-2" onclick="goBack()" data-bs-dismiss="modal">Kembali</button>
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

    function goBack() {
        window.history.back();
    }

    $(document).on('submit', '#form', function(event) {
        event.preventDefault();
        var form = $('#form')[0];
        var nilai = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '<?= $url2; ?>proses/dosen',
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
                        window.location = "<?= $url2 ?>dosen";
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