<?php
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/class_paging.php');
require_once('../config/cek_akses.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
cek_url($url, $proses, 'edit', 'profil', 'judul_seo = "' . @$_GET['id'] . '"');
$p = $proses->tampil_data_saja('*', 'profil', '1=1 AND judul_seo = "' . @$_GET['id'] . '"');
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
    <title><?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['title']; ?></title>
    <meta name="description" content="<?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= str_replace('-', ' ', $_GET['menu']) . ' | ' . $control['deskripsi']; ?>">
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
        <!-- slider-area -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $no = 1;
                $pa = $proses->tampil_data_select('*', 'banner', '1=1 AND ket = "ppid" AND publish = "Yes" ORDER BY urutan ASC');
                foreach ($pa as $pr) {
                    if ($no == 1) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                ?>
                    <div class="carousel-item <?= $active; ?>">
                        <img src="<?= $url . 'assets/images/banner/' . $pr['file'] ?>" class="d-block w-100">
                    </div>
                <?php $no++;
                } ?>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <!-- slider-area -->
    </section>

    <section class="services pt-70 pb-0">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3><?= str_replace('-', ' ', $_GET['menu']); ?></h3>
                <p><?= $p['judul']; ?></p>
            </div>
        </div>
    </section>

    <section class="blog-details pt-3 pb-0">
        <div class="container">
            <div class="col-lg-10 me-auto ms-auto">
                <div class="default-section-title">
                    <p class="mt-4" style="text-align:justify;">
                        <?= str_replace('assets/images', '../assets/images', @$p['isi']); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="precess pb-70 mt-0">
        <div class="container">
            <div class="section-content pt-0 mt-0">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="process-card">
                            <i class="flaticon-google-docs"></i>
                            <h4><a href="<?= $url; ?>ppid/informasi-wajib-berkala">Informasi Wajib Berkala</a></h4>
                            <p>Informasi yang diperbaharui kemudian disediakan dan diumumkan kepada publik secara rutin atau berkala sekurang-kurangnya setiap 6 bulan sekali.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="process-card">
                            <i class="flaticon-google-docs"></i>
                            <h4><a href="<?= $url; ?>ppid/informasi-wajib-sedia-setiap-saat">Informasi Wajib Sedia Setiap Saat</a></h4>
                            <p>Informasi yang harus disediakan oleh Badan Publik dan siap tersedia untuk bisa langsung diberikan kepada Pemohon Informasi Publik ketika terdapat permohonan terhadap Informasi Publik tersebut.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="process-card">
                            <i class="flaticon-google-docs"></i>
                            <h4><a href="<?= $url; ?>ppid/informasi-publik-diumumkan-secara-serta-merta">Informasi Publik Diumumkan Secara Serta Merta</a></h4>
                            <p>Informasi yang berkaitan dengan hajat hidup orang banyak dan ketertiban umum dan wajib diumumkan secara serta merta tanpa penundaan.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="process-card">
                            <i class="flaticon-google-docs"></i>
                            <h4><a href="<?= $url; ?>ppid/informasi-publik-dikecualikan">Informasi Publik di Kecualikan</a></h4>
                            <p>Informasi (berisi informasi tertentu yang akan dikecualikan), dasar hukum pengecualian, konsekuensi/ pertimbangan bagi publik (berisi uraian konsekuensi/ pertimbangannya): dibuka atau ditutup, dan jangka waktu (disebutkan jangka waktunya).</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="process-card">
                            <i class="flaticon-google-docs"></i>
                            <h4><a href="<?= $url; ?>ppid/formulir-permintaan-informasi">Formulir Permintaan Informasi</a></h4>
                            <p>Dokumen yang digunakan untuk meminta atau memperoleh informasi tertentu dari sumber yang memiliki data atau pengetahuan yang diperlukan.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="process-card">
                            <i class="flaticon-google-docs"></i>
                            <h4><a href="<?= $url; ?>ppid/formulir-keberatan-keluhan">Formulir Keberatan/Keluhan</a></h4>
                            <p>Formulir yang digunakan untuk menyampaikan resmi atau tertulis atas ketidakpuasan, keberatan, atau keluhan terhadap suatu hal, produk, layanan, atau kebijakan.</p>
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