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
cek_url($url2, $proses, $_GET['act'], 'penjamu', 'id_mutu = "' . @$_GET['id'] . '"');
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
                                        $row = $proses->tampil_data_saja('*', 'penjamu', 'id_mutu = ' . $_GET['id'] . '');
                                        echo '<input type="hidden" name="id" value="' . $row['id_mutu'] . '">';
                                        echo '<input type="hidden" name="act" value="edit">';
                                        if (empty($row['nama_file'])) {
                                            $files = '';
                                            $required = 'required';
                                            $ket = '<br>*Kosongkan jika tidak merubah file';
                                        } else {
                                            $link = $url . 'berkas/' . $row['nama_file'];
                                            $files = '<div class="mb-2"><a href="' . $link . '" target="_blank"><i class="ph-file-pdf text-info"></i> Lihat File</a></div>';
                                            $required = '';
                                            $ket = '<br>*Kosongkan jika tidak merubah file';
                                        }
                                    } else {
                                        echo '<input type="hidden" name="act" value="add">';
                                        $files = '';
                                        $ket = '';
                                        $required = 'required';
                                    }
                                    ?>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="mb-2">
                                            <label class="form-label">Keterangan</label>
                                            <input type="text" name="judul" class="form-control" value="<?= @$row['judul']; ?>" required>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">Kategori</label>
                                            <?= kategori('menu', @$row['menu']); ?>
                                        </div>
                                        <div class="revdiv">
                                            <?= $files; ?>
                                            <div class="mb-2">
                                                <label class="form-label">Upload File</label>
                                                <input type="file" name="fupload" id="file" onchange="return validasiFile()" class="form-control" <?= $required; ?>>
                                                <div class="form-text text-muted">*Accepted formats: pdf Max file size 5Mb<?= $ket; ?></div>
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
            url: '<?= $url2; ?>proses/penjamu',
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
                        window.location = "<?= $url2 ?>penjamu";
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
        var ekstensiOk = /(\.pdf)$/i;
        var file_size = $('#file')[0].files[0].size;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file yang memiliki ekstensi .pdf');
            inputFile.value = '';
            return false;
        } else {
            if (file_size > 5000000) {
                alert('Ukuran file harus kurang dari 5Mb');
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
                    url: '<?= $url2; ?>proses/penjamu',
                    data: {
                        del: del,
                        act: act,
                        files: files
                    },
                    success: function(data) {
                        $(".revdiv").load(location.href + " .revdiv");
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