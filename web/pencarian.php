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
    <title><?= 'Pencarian | ' . $control['title']; ?></title>
    <meta name="description" content="<?= 'Pencarian | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= 'Pencarian | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= 'Pencarian | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= 'Pencarian | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= 'Pencarian | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= 'Pencarian | ' . $control['deskripsi']; ?>">
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
                <h1 class="mb-0">Informasi</h1>
                <ul>
                    <li class="text-white me-0">Fakultas Teknik</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <h4 class="mb-3">Hasil Pencarian : <?= anti_injection($_GET['keyword']); ?></h4>
                        <?php
                        $keyword = anti_injection($_GET['keyword']);
                        $sql = $proses->tampil_data_select('*', 'berita', 'judul LIKE "%' . $keyword . '%" OR isi LIKE "%' . $keyword . '%" ORDER BY tanggal DESC');
                        foreach ($sql as $row) {
                        ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                                <div class="blog-card mt-0">
                                    <div class="blog-card-img">
                                        <a href="<?= $url . 'informasi/' . $row['judul_seo']; ?>">
                                            <img src="<?= $url . 'assets/images/berita/thumb_' . $row['file']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-card-text-area">
                                        <div class="blog-date">
                                            <ul>
                                                <li><i class="far fa-calendar-alt"></i> <?= tgl_indo($row['tanggal']); ?></li>
                                                <li><i class="far fa-eye"></i> <?= $row['dibaca']; ?> Views</li>
                                                <li><i class="fas fa-user"></i> By Admin</li>
                                            </ul>
                                        </div>
                                        <h4><a href="<?= $url . 'informasi/' . $row['judul_seo']; ?>"><?= $row['judul']; ?></a></h4>
                                        <p><?= potong_text(strip_tags($row['isi'])); ?></p>
                                        <a class="read-more-btn" href="<?= $url . 'berita/' . $row['judul_seo']; ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
                            $sql = $proses->tampil_data_select('*', 'berita', 'publish = "Yes" ORDER BY tanggal DESC LIMIT 3, 5');
                            foreach ($sql as $row) {
                            ?>
                                <p class="mb-0"><b><a href="<?= $url . 'informasi/' . $row['judul_seo']; ?>"><?= $row['judul']; ?></a></b></p>
                                <p class="mb-0 mt-1"><i class="far fa-calendar-alt pe-1"></i> <?= tgl_indo($row['tanggal']); ?></p>
                                <hr class="mt-2 mb-2">
                            <?php } ?>
                        </div>
                        <div class="sidebar-card sidebar-tag mt-30 mb-30">
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