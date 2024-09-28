<?php
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/class_paging.php');
require_once('../config/cek_akses.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
$filename = $url . 'assets/images/logo/' . $control['logo'];
$data = getimagesize($filename);
$width = $data[0];
$height = $data[1];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= 'Penjaminan Mutu | ' . $control['title']; ?></title>
    <meta name="description" content="<?= 'Penjaminan Mutu | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= 'Penjaminan Mutu | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= 'Penjaminan Mutu | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= 'Penjaminan Mutu | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= 'Penjaminan Mutu | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= 'Penjaminan Mutu | ' . $control['deskripsi']; ?>">
    <meta name="twitter:image" content="<?= $filename; ?>">

    <link rel="stylesheet" href="<?= $url; ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/fontawsome.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/fonts/flaticon.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/odometer.min.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $url; ?>assets/css/responsive.css">

</head>

<body>

    <?= header_web($proses, $url); ?>

    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1 class="mb-0">Penjaminan Mutu</h1>
                <ul>
                    <li class="text-white me-0">Fakultas Teknik</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 me-auto ms-auto">
                    <div class="faq-text-area">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item mt-0">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Dokumen Mutu UNG<i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i></button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "dokumen-mutu-ung"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Laporan Monev<i class="fas fa-plus-circle"></i>
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "laporan-monev"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Laporan Audit <i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "laporan-audit"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Laporan Survey <i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "laporan-survey"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Laporan RTM <i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i>
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "laporan-rtm"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        Pedoman dan Panduan <i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i>
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "pedoman-panduan"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        Laporan Lainnya <i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i>
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:3%">No</th>
                                                        <th>Dokumen</th>
                                                        <th class="text-center" style="width:5%">File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = $proses->tampil_data_select('*', 'penjamu', 'menu = "laporan-lainnya"');
                                                    foreach ($sql as $row) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no; ?></td>
                                                            <td><?= $row['judul']; ?></td>
                                                            <td class="text-center"><a href="<?= $url; ?>berkas/<?= $row['nama_file'] ?>"><i class="fa fa-file-download"></i></a></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= footer($proses, $url); ?>

    <script src="<?= $url; ?>assets/js/jquery.min.js"></script>
    <script src="<?= $url; ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?= $url; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $url; ?>assets/js/meanmenu.js"></script>
    <script src="<?= $url; ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= $url; ?>assets/js/magnific-popup.min.js"></script>
    <script src="<?= $url; ?>assets/js/TweenMax.js"></script>
    <script src="<?= $url; ?>assets/js/nice-select.min.js"></script>
    <script src="<?= $url; ?>assets/js/form-validator.min.js"></script>
    <script src="<?= $url; ?>assets/js/contact-form-script.js"></script>
    <script src="<?= $url; ?>assets/js/ajaxchimp.min.js"></script>
    <script src="<?= $url; ?>assets/js/owl.carousel2.thumbs.min.js"></script>
    <script src="<?= $url; ?>assets/js/appear.min.js"></script>
    <script src="<?= $url; ?>assets/js/odometer.min.js"></script>
    <script src="<?= $url; ?>assets/js/custom.js"></script>
</body>

</html>