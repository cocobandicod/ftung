<?php
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/class_paging.php');
require_once('../config/cek_akses.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
cek_url($url, $proses, 'edit', 'data_dosen', 'nidn = "' . @$_GET['nip'] . '"');
$p = $proses->tampil_data_saja('*', 'data_dosen', '1=1 AND nidn = "' . @$_GET['nip'] . '"');
$pe = $proses->tampil_data_saja('*', 'jurusan', '1=1 AND seo = "' . @$_GET['id'] . '"');
$filename = $url . 'assets/images/logo/' . $control['logo'];
$data = @getimagesize(@$filename);
$width = @$data[0];
$height = @$data[1];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $p['nama'] . ' | ' . $control['title']; ?></title>
    <meta name="description" content="<?= $p['nama'] . ' | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= $p['nama'] . ' | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= $p['nama'] . ' | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= $p['nama'] . ' | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $p['nama'] . ' | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= $p['nama'] . ' | ' . $control['deskripsi']; ?>">
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
    <style>
        .ar-title a {
            color: #000;
            font-weight: bold;
        }

        .ar-meta a {
            color: #7a7a7a;
        }
    </style>
</head>

<body>

    <?= header_web_jurusan($proses, $url, $pe['seo'], $pe['id_jurusan']); ?>

    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1 class="mb-0">Tenaga Pengajar</h1>
                <ul>
                    <li class="text-white me-0">Jurusan <?= @$pe['nama_jurusan']; ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details pt-5 pb-5">
        <div class="container">
            <div class="col-lg-11 me-auto ms-auto">
                <div class="default-section-title row">
                    <div class="terms col-lg-4">
                        <div class="sidebar-card sidebar-category mt-0">
                            <?php
                            if ($p['id_sinta'] == NULL) {
                                $gambar = $url . 'assets/images/dosen/dosen_kecil.jpg';
                                $sinta = '';
                            } else {
                                $gambar = 'https://scholar.googleusercontent.com/citations?view_op=view_photo&user=' . $p['id_scholar'] . '&citpid=1';
                            }
                            ?>
                            <img src="<?= $gambar; ?>" style="object-fit:cover;" alt="image">
                            <h6 class="pt-3"><?= $p['nama']; ?></h6>
                            <ul class="payment">
                                <li><?= $p['nidn']; ?></li>
                                <li>Lektor Kepala</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h3 class="pb-3">Scopus</h3>
                        <?php
                        $link1 = 'https://sinta.kemdikbud.go.id/authors/profile/' . $p['id_sinta'];
                        $sumber1 = file_get_contents($link1);
                        //Inilah awalan source yang akan kita grab,

                        $jum_scoopus0 = explode('<td class="text-warning">', $sumber1);
                        $jum_scoopus1 = explode('</td>', $jum_scoopus0[1]);
                        $jum_scoopus = $jum_scoopus1[0];

                        $scoopus = explode('<div class="ar-list-item mb-5">', $sumber1);
                        //Inilah akhiran source yang akan kita grab,

                        if ($jum_scoopus == 1) {
                            $scoopus1 = explode('<a href="https://sinta.kemdikbud.go.id/logins" class="btn btn-info btn-sm">View more ...</a>', $scoopus[1]);
                            echo '<div>' . @$scoopus1[0] . '<br>';
                        } else {
                        }

                        if ($jum_scoopus > 1) {
                            $scoopus1 = explode('<div class="ar-list-item mb-5">', $scoopus[1]);
                            echo '<div>' . $scoopus1[0] . '';
                            echo @$scoopus1[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoopus > 2) {
                            $scoopus2 = explode('<div class="ar-list-item mb-5">', $scoopus[2]);
                            echo '<div>' . $scoopus2[0] . '';
                            echo @$scoopus2[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoopus > 3) {
                            $scoopus3 = explode('<div class="ar-list-item mb-5">', $scoopus[3]);
                            echo '<div>' . $scoopus3[0] . '';
                            echo @$scoopus3[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoopus > 4) {
                            $scoopus4 = explode('<div class="ar-list-item mb-5">', $scoopus[4]);
                            echo '<div>' . $scoopus4[0] . '';
                            echo @$scoopus4[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoopus > 5) {
                            $scoopus5 = explode('<div class="ar-list-item mb-5">', $scoopus[5]);
                            echo '<div>' . $scoopus5[0] . '';
                            echo @$scoopus5[1] . '<br>';
                            echo '<a href="https://sinta.kemdikbud.go.id/authors/profile/' . $p['id_sinta'] . '/?view=scopus" class="default-button p-2 m-0">Read More <i class="fa fa-angle-right"></i></a>';
                            echo '<br><br>';
                        } else {
                        }

                        ?>
                        <h3 class="pb-3">Google Scholar</h3>
                        <?php

                        $link2 = 'https://sinta.kemdikbud.go.id/authors/profile/' . $p['id_sinta'] . '/?view=googlescholar';
                        $sumber2 = file_get_contents($link2);
                        //Inilah awalan source yang akan kita grab,

                        $scholar = explode('<div class="ar-list-item mb-5">', $sumber2);

                        $jum_scoolar0 = explode('<td class="text-success">', $sumber2);
                        $jum_scoolar1 = explode('</td>', $jum_scoolar0[1]);
                        $jum_scoolar = $jum_scoolar1[0];

                        //Inilah akhiran source yang akan kita grab,
                        if ($jum_scoolar == 1) {
                            $scoolar1 = explode('<a href="https://sinta.kemdikbud.go.id/logins" class="btn btn-info btn-sm">View more ...</a>', $scholar[1]);
                            echo '<div>' . @$scoolar1[0] . '<br>';
                        } else {
                        }

                        if ($jum_scoolar > 1) {
                            $scholar1 = explode('<div class="ar-list-item mb-5">', $scholar[1]);
                            echo '<div>' . $scholar1[0] . '';
                            echo @$scholar1[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoolar > 2) {
                            $scholar2 = explode('<div class="ar-list-item mb-5">', $scholar[2]);
                            echo '<div>' . $scholar2[0] . '';
                            echo @$scholar2[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoolar > 3) {
                            $scholar3 = explode('<div class="ar-list-item mb-5">', $scholar[3]);
                            echo '<div>' . $scholar3[0] . '';
                            echo @$scholar3[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoolar > 4) {
                            $scholar4 = explode('<div class="ar-list-item mb-5">', $scholar[4]);
                            echo '<div>' . $scholar4[0] . '';
                            echo @$scholar4[1] . '<br>';
                        } else {
                        }

                        if ($jum_scoolar > 5) {
                            $scholar5 = explode('<div class="ar-list-item mb-5">', $scholar[5]);
                            echo '<div>' . $scholar5[0] . '';
                            echo @$scholar5[1] . '<br>';
                            echo '<a href="https://sinta.kemdikbud.go.id/authors/profile/' . $p['id_sinta'] . '/?view=googlescholar" class="default-button p-2 m-0">Read More <i class="fa fa-angle-right"></i></a>';
                        } else {
                        }
                        ?>
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