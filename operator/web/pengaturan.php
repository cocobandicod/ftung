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
                                <form method="post" id="form" class="form" enctype="multipart/form-data">
                                    <?php
                                    $row = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
                                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                                    echo '<input type="hidden" name="act" value="edit">';
                                    ?>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Title</label>
                                            <div class="col-lg-10 mb-2">
                                                <input type="text" name="title" class="form-control" value="<?= @$row['title']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Keywords</label>
                                            <div class="col-lg-10 mb-2">
                                                <input type="text" name="keywords" class="form-control" value="<?= @$row['keywords']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Deskripsi</label>
                                            <div class="col-lg-10 mb-2">
                                                <input type="text" name="deskripsi" class="form-control" value="<?= @$row['deskripsi']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Alamat</label>
                                            <div class="col-lg-10 mb-2">
                                                <textarea name="alamat" class="form-control"><?= @$row['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row mb-0">
                                                    <label class="col-lg-4 col-form-label">Email</label>
                                                    <div class="col-lg-8 mb-2">
                                                        <input type="email" name="email" class="form-control" value="<?= @$row['email']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-0">
                                                    <label class="col-lg-4 col-form-label">Telepon</label>
                                                    <div class="col-lg-8 mb-2">
                                                        <input type="text" name="telepon" class="form-control" value="<?= @$row['telepon']; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-0">
                                                    <label class="col-lg-4 col-form-label">Google Maps</label>
                                                    <div class="col-lg-8 mb-2">
                                                        <div class="input-group">
                                                            <input type="text" name="maps" class="form-control" value="<?= @$row['maps']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-0">
                                                    <label class="col-lg-4 col-form-label">Youtube</label>
                                                    <div class="col-lg-8 mb-2">
                                                        <div class="input-group">
                                                            <span class="input-group-text">https://www.youtube.com/watch?v=</span>
                                                            <input type="text" name="profil_youtube" class="form-control" value="<?= @$row['profil_youtube']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Rekapan Fakultas</h5>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Jumlah Program Studi</label>
                                            <div class="col-lg-2 mb-2">
                                                <input type="number" name="program_studi" class="form-control" value="<?= @$row['program_studi']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Jumlah Mahasiswa</label>
                                            <div class="col-lg-2 mb-2">
                                                <input type="number" name="mahasiswa" class="form-control" value="<?= @$row['mahasiswa']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Jumlah Lulusan</label>
                                            <div class="col-lg-2 mb-2">
                                                <input type="number" name="lulusan" class="form-control" value="<?= @$row['lulusan']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Jumlah Tenaga Pengajar</label>
                                            <div class="col-lg-2 mb-2">
                                                <input type="number" name="tenaga_pengajar" class="form-control" value="<?= @$row['tenaga_pengajar']; ?>" required>
                                            </div>
                                        </div>
                                        <h5>Sosial Media</h5>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Facebook</label>
                                            <div class="col-lg-5 mb-2">
                                                <div class="input-group">
                                                    <span class="input-group-text">facebook.com/</span>
                                                    <input type="text" name="facebook" class="form-control" value="<?= @$row['facebook']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Twitter</label>
                                            <div class="col-lg-5 mb-2">
                                                <div class="input-group">
                                                    <span class="input-group-text">twitter.com/</span>
                                                    <input type="text" name="twitter" class="form-control" value="<?= @$row['twitter']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Instagram</label>
                                            <div class="col-lg-5 mb-2">
                                                <div class="input-group">
                                                    <span class="input-group-text">instagram.com/</span>
                                                    <input type="text" name="instagram" class="form-control" value="<?= @$row['instagram']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label class="col-lg-2 col-form-label">Youtube Channel</label>
                                            <div class="col-lg-5 mb-2">
                                                <div class="input-group">
                                                    <span class="input-group-text">https://www.youtube.com/</span>
                                                    <input type="text" name="youtube" class="form-control" value="<?= @$row['youtube']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="simpan" class="btn btn-primary mt-2">
                                            <i class="ph-floppy-disk me-1"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                                <div class="col-sm-12 col-lg-12">
                                    <h5 class="mt-4">Logo, Profil, Popup</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-0">
                                                <label class="col-lg-4 col-form-label">Logo Header</label>
                                                <div class="col-lg-8 mb-2">
                                                    <div class="input-group">
                                                        <img src="<?= $url; ?>assets/images/logo/<?= $row['logo']; ?>" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-0">
                                                <form method="post" id="form1" enctype="multipart/form-data">
                                                    <input type="hidden" name="act" value="upload1">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="input-group">
                                                            <input type="file" name="image1" id="file1" onchange="return validasiFile1()" class="form-control" required>
                                                            <button class="btn btn-success" type="submit"><i class="ph-upload-simple me-1"></i> Upload</button>
                                                        </div>
                                                        <div class="form-text text-muted">* Accepted formats: jpg. jpeg Max file size 1Mb<br>
                                                            * Ukuran Gambar 484x62 pixel</div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-0">
                                                <label class="col-lg-4 col-form-label">Profil Video</label>
                                                <div class="col-lg-8 mb-2">
                                                    <div class="input-group">
                                                        <img src="<?= $url; ?>assets/images/bg/<?= $row['profil']; ?>" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-0">
                                                <form method="post" id="form1" enctype="multipart/form-data">
                                                    <input type="hidden" name="act" value="upload2">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="input-group">
                                                            <input type="file" name="image2" id="file2" onchange="return validasiFile2()" class="form-control" required>
                                                            <button class="btn btn-success" type="submit"><i class="ph-upload-simple me-1"></i> Upload</button>
                                                        </div>
                                                        <div class="form-text text-muted">* Accepted formats: png. jpg. Max file size 1Mb<br>
                                                            * Ukuran Gambar 628x500 pixel</div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-0">
                                                <label class="col-lg-4 col-form-label">Popup Beranda</label>
                                                <div class="col-lg-8 mb-2">
                                                    <div class="input-group">
                                                        <img src="<?= $url; ?>assets/images/bg/<?= $row['popup']; ?>" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-0">
                                                <form method="post" id="form1" enctype="multipart/form-data">
                                                    <input type="hidden" name="act" value="upload3">
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="input-group">
                                                            <input type="file" name="image3" id="file3" onchange="return validasiFile3()" class="form-control" required>
                                                            <button class="btn btn-success" type="submit"><i class="ph-upload-simple me-1"></i> Upload</button>
                                                        </div>
                                                        <div class="form-text text-muted">*Accepted formats: png. jpg. Max file size 1Mb</div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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

    $(document).on('submit', '#form', function(event) {
        event.preventDefault();
        var form = $('#form')[0];
        var nilai = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '<?= $url2; ?>proses/pengaturan',
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
                }).show();
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

    $(document).on('submit', '#form1', function(event) {
        event.preventDefault();
        var form = $('#form1')[0];
        var nilai = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '<?= $url2; ?>proses/pengaturan',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: nilai,
            success: function(data) {
                new Noty({
                    text: '<h6><i class="ph-check-square me-1"></i> Data Berhasil Dimasukan!</h6>',
                    type: 'success',
                    theme: 'limitless',
                    layout: 'topRight',
                    timeout: 1000
                }).show(
                    setTimeout(function() {
                        window.location = "<?= $url2 ?>pengaturan";
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
            }
        });
    });

    function validasiFile1() {
        var inputFile = document.getElementById('file1');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg)$/i;
        var file_size = $('#file1')[0].files[0].size;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file yang memiliki ekstensi .jpg .jpeg');
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

    function validasiFile2() {
        var inputFile = document.getElementById('file2');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
        var file_size = $('#file2')[0].files[0].size;
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

    function validasiFile3() {
        var inputFile = document.getElementById('file3');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
        var file_size = $('#file3')[0].files[0].size;
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
</script>

</html>