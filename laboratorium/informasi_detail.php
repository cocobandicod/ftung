<?php
error_reporting(0);
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/cek_akses.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
cek_url($url, $proses, 'edit', 'berita', 'judul_seo = "' . @$_GET['seo'] . '"');
$p = $proses->tampil_data_saja('*', 'berita', '1=1 AND judul_seo = "' . @$_GET['seo'] . '"');
$pa = $proses->tampil_data_saja('*', 'jurusan', '1=1 AND seo = "' . @$_GET['id'] . '"');
$dibaca = $p['dibaca'];
$data = array(
    'dibaca' => $dibaca + 1
);
$result = $proses->edit_data('berita', $data, 'judul_seo', @$_GET['id']);
$filename = $url . 'assets/images/berita/' . @$p['file'];
$data = @getimagesize(@$filename);
$width = @$data[0];
$height = @$data[1];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Informasi | <?= $pa['nama_jurusan'] . ' | ' . $p['judul']; ?></title>
    <meta name="description" content="<?= $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">

    <!-- Place favicon.ico in the root directory -->
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $p['judul']; ?>" />
    <meta property="og:description" content="<?= potong_text(strip_tags($p['isi'])); ?>" />
    <meta property="og:url" content="<?= $url . 'Informasi' . $pa['nama_jurusan'] . ' | ' . $p['judul_seo'] ?>" />
    <meta property="og:site_name" content="<?= $control['title']; ?>" />
    <meta property="article:published_time" content="<?= $p['tanggal']; ?>" />
    <meta property="og:image" content="<?= @$filename; ?>" />
    <meta property="og:image:width" content="<?= @$width; ?>" />
    <meta property="og:image:height" content="<?= @$height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $p['judul']; ?>">
    <meta name="twitter:description" content="<?= potong_text(strip_tags($p['isi'])); ?>">
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

    <?= header_lab_jurusan($proses, $url, $pa['seo'], $pa['id_jurusan']); ?>

    <section class="uni-banner">
        <div class="container">
            <div class="uni-banner-text-area">
                <h1 class="mb-0">Berita</h1>
                <ul>
                    <li class="text-white me-0">Jurusan <?= @$pa['nama_jurusan']; ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="blog-details-text-area details-text-area">
                        <h2 class="mt-0"><?= $p['judul']; ?></h2>
                        <div class="blog-date">
                            <ul>
                                <li><i class="far fa-calendar-alt"></i> <?= tgl_indo($p['tanggal']); ?></li>
                                <li><i class="far fa-eye"></i> <?= $p['dibaca']; ?> Views</li>
                                <li><i class="fas fa-user"></i> By <a href="#">Admin</a></li>
                            </ul>
                        </div>
                        <img src="<?= $url . 'assets/images/berita/thumb_' . $p['file']; ?>" class="mb-3" alt="image">
                        <div style="text-align: justify;">
                            <?= str_replace('assets/images', '../assets/images', $p['isi']); ?>
                        </div>
                    </div>
                    <div class="blog-text-footer mt-30 mb-30 pt-3">
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_email"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="sidebar-area pl-20 pt-30">
                        <div class="sidebar-card search-box">
                            <form role="search" method="GET" action="<?= $url; ?>search/">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search Here.." required>
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-card recent-news mt-30">
                            <h3>Berita Lainnya</h3>
                            <?php
                            $sql = $proses->tampil_data_select('*', 'berita', 'id_jurusan = "' . $pa['id_jurusan'] . '" AND publish = "Yes" ORDER BY tanggal DESC LIMIT 3, 5');
                            foreach ($sql as $row) {
                            ?>
                                <p class="mb-0"><b><a href="<?= $url . 'jurusan/' . $pa['seo'] . '/informasi/' . $row['judul_seo']; ?>"><?= $row['judul']; ?></a></b></p>
                                <p class="mb-0 mt-1"><i class="far fa-calendar-alt pe-1"></i> <?= tgl_indo($row['tanggal']); ?></p>
                                <hr class="mt-2 mb-2">
                            <?php } ?>
                        </div>
                        <div class="sidebar-card sidebar-tag mt-30">
                            <h3>Tags</h3>
                            <ul>
                                <li><a href="<?= $url; ?>tags/fakultas-teknik">Fakultas Teknik</a></li>
                                <li><a href="<?= $url; ?>tags/sipil">Sipil</a></li>
                                <li><a href="<?= $url; ?>tags/elektro">Elektro</a></li>
                                <li><a href="<?= $url; ?>tags/informatika">Informatika</a></li>
                                <li><a href="<?= $url; ?>tags/arsitektur">Arsitektur</a></li>
                                <li><a href="<?= $url; ?>tags/senirupa">Seni Rupa</a></li>
                                <li><a href="<?= $url; ?>tags/industri">Industri</a></li>
                            </ul>
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