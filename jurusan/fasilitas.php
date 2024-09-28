<?php
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/class_paging.php');
require_once('../config/cek_akses.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
cek_url($url, $proses, 'edit', 'jurusan', 'seo = "' . @$_GET['id'] . '"');
$p = $proses->tampil_data_saja('*', 'jurusan', '1=1 AND seo = "' . @$_GET['id'] . '"');
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
    <title><?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['title']; ?></title>
    <meta name="description" content="<?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= 'Fasilitas | ' . $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>">
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

    <?= header_web_jurusan($proses, $url, $p['seo'], $p['id_jurusan']); ?>

    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1 class="mb-0">Fasilitas</h1>
                <ul>
                    <li class="text-white me-0">Jurusan <?= @$p['nama_jurusan']; ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details pt-5 pb-5">
        <div class="container">
            <div class="col-lg-10 me-auto ms-auto row">
                <?php
                $sql = $proses->tampil_data_select('*', 'fasilitas', '1=1 AND (id_jurusan = 0 OR id_jurusan = ' . $p['id_jurusan'] . ') ORDER BY id_jurusan ASC');
                foreach ($sql as $row) {
                ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="events-card">
                            <div class="blog-thumb4">
                                <img src="<?= $url; ?>assets/images/fasilitas/thumb_<?= $row['gambar']; ?>" style="object-fit:cover;" alt="image">
                            </div>
                            <div class="events-card-text">
                                <h4 class="text-white"><?= $row['keterangan']; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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