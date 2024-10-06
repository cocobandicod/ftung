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
cek_url($url2, $proses, $_GET['act'], 'banner', 'id = "' . @$_GET['id'] . '"');
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
                                        <h6><?= ucfirst($_GET['act']) . ' ' . str_replace('-', ' ', $_GET['judul']); ?></h6>
                                    </div>
                                </div>
                                <form method="post" id="form" class="form" enctype="multipart/form-data">
                                    <?php
                                    if ($_GET['act'] == 'edit') {
                                        $row = $proses->tampil_data_saja('*', 'banner', 'id = ' . $_GET['id'] . '');
                                        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                                        echo '<input type="hidden" name="act" value="edit">';
                                        if (empty($row['file'])) {
                                            $image = '';
                                            $required = 'required';
                                            $ket = '<br>*Kosongkan jika tidak merubah gambar';
                                        } else {
                                            $image = '<div class="mb-2">
                                            <label class="form-label">Gambar</label>
                                            <img src="' . $url . 'assets/images/banner/' . $row['file'] . '" class="img-thumbnail">
                                            <div class="form-text text-muted"><a href="#" id="del" data-id="' . $row['id'] . '" data-file="' . $row['file'] . '" data-nama="' . $row['file'] . '" data-act="image"><i class="ph-trash me-1"></i>Hapus Gambar</a></div>
                                            </div>';
                                            $required = '';
                                            $ket = '<br>*Kosongkan jika tidak merubah gambar';
                                        }
                                    } else {
                                        echo '<input type="hidden" name="act" value="add">';
                                        $image = '';
                                        $ket = '';
                                        $required = 'required';
                                    }
                                    ?>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="row">
                                            <div class="mb-2 col-lg-6">
                                                <label class="form-label">Urutan</label>
                                                <input type="number" name="urutan" class="form-control" value="<?= @$row['urutan']; ?>" required>
                                            </div>
                                            <div class="mb-2 col-lg-6">
                                                <label class="form-label">Jenis Banner</label>
                                                <?= status_banner('ket', @$row['ket']); ?>
                                            </div>
                                            <div class="mb-2 col-lg-6">
                                                <label class="form-label">Publish</label>
                                                <?= publish('publish', @$row['publish']); ?>
                                            </div>
                                            <div class="mb-2 col-lg-6">
                                                <label class="form-label">Jenis Banner</label>
                                                <?= jenis('jenis', @$row['jenis']); ?>
                                            </div>
                                        </div>
                                        <?= $image; ?>
                                        <div class="mb-2">
                                            <label class="form-label">Upload Gambar</label>
                                            <input type="file" name="image" id="file" onchange="return validasiFile()" class="form-control" <?= $required; ?>>
                                            <div class="form-text text-muted">*Ukuran Banner 1500x514 pixel<br>*Accepted formats: png, jpg. Max file size 1Mb<?= $ket; ?></div>
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
            url: '<?= $url2; ?>proses/banner',
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
                        window.location = "<?= $url2 ?>banner";
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

    function validasiFile() {
        var inputFile = document.getElementById('file');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
        var file_size = $('#file')[0].files[0].size;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
            inputFile.value = '';
            return false;
        } else {
            if (file_size > 1000000) {
                alert('Ukuran file harus kurang dari 1Mb');
                inputFile.value = '';
                return false;
            }
        }
    }

    $(document).on('click', '#del', function(e) {
        var nama = $(e.currentTarget).data('nama');
        var del = $(e.currentTarget).data('id');
        var act = $(e.currentTarget).data('act');
        var files = $(e.currentTarget).data('file');
        swalInit.fire({
            title: 'Gambar ini akan dihapus ?',
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
                        act: act,
                        files: files
                    },
                    success: function(data) {
                        setTimeout(function() {
                            window.location = "<?= $url2 ?>banner/add";
                        }, 2000)
                    }
                });
                swalInit.fire(
                    'Deleted!',
                    'Gambar berhasil dihapus.',
                    'success'
                )
            }
        });
    });
</script>

</html>