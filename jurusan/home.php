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
    <title><?= $p['nama_jurusan'] . ' | ' . $control['title']; ?></title>
    <meta name="description" content="<?= $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= $p['nama_jurusan'] . ' | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $p['nama_jurusan'] . ' | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= $p['nama_jurusan'] . ' | ' . $control['deskripsi']; ?>">
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
        <!-- slider-area -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $no = 1;
                $pa = $proses->tampil_data_select('*', 'banner', '1=1 AND ket = "' . $p['seo'] . '" AND publish = "Yes" ORDER BY urutan ASC');
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

    <section class="fun-facts fun-facts-1 pt-70 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card">
                        <i class="flaticon-man-user"></i>
                        <h2><span class="odometer" data-count="<?= $p['doctoral']; ?>">00</span></h2>
                        <p>Doctoral</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card">
                        <i class="flaticon-man-user"></i>
                        <h2>
                            <span class="odometer" data-count="<?= $p['magister']; ?>">00</span>
                        </h2>
                        <p>Magister</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card">
                        <i class="flaticon-man-user"></i>
                        <h2>
                            <span class="odometer" data-count="<?= $p['mahasiswa']; ?>">00</span>
                            <span class="sign-icon">±</span>
                        </h2>
                        <p>Mahasiswa</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card last-card">
                        <i class="flaticon-man-user"></i>
                        <h2>
                            <span class="odometer" data-count="<?= $p['alumni']; ?>">00</span>
                            <span class="sign-icon">±</span>
                        </h2>
                        <p>Alumni</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services pt-70 pb-70">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>Informasi Jurusan</h3>
                <p>Berita/Informasi/Pengumuman Jurusan <?= $p['nama_jurusan']; ?></p>
            </div>
            <div class="section-content">
                <div class="service-slider-area-1 owl-carousel">
                    <?php
                    $sql = $proses->tampil_data_select('*', 'berita', 'id_jurusan = "' . $p['id_jurusan'] . '" AND publish = "Yes" ORDER BY tanggal DESC LIMIT 6');
                    foreach ($sql as $b) {
                    ?>
                        <div class="service-card mlr-15 mb-30">
                            <div class="blog-card">
                                <div class="blog-card-img blog-thumb2">
                                    <a href="<?= $url . 'informasi/' . $b['judul_seo']; ?>"><img src="<?= $url; ?>assets/images/berita/thumb_<?= $b['file']; ?>" style="object-fit: cover;" alt="image"></a>
                                </div>
                                <div class="blog-card-text-area">
                                    <div class="blog-date">
                                        <ul>
                                            <li><i class="fas fa-calendar-alt"></i> <?= tgl_indo($b['tanggal']); ?></li>
                                            <li><i class="fas fa-user"></i> By <a href="#">Admin</a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="<?= $url . 'informasi/' . $b['judul_seo']; ?>"><?= $b['judul']; ?></a></h4>
                                    <p><?= potong_text2(strip_tags($b['isi'])); ?></p>
                                    <a class="read-more-btn" href="<?= $url . 'informasi/' . $b['judul_seo']; ?>">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="team ptb-100 bg-f9fbfe">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>Pimpinan Jurusan</h3>
                <p>Pimpinan Jurusan <?= $p['nama_jurusan']; ?> Fakultas Teknik Universitas Negeri Gorontalo</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <?php
                    $sql = $proses->tampil_data_select('nama,jabatan,gambar', 'struktur_organisasi', 'id_jurusan = ' . $p['id_jurusan'] . '');
                    foreach ($sql as $s) {
                        if (empty($s['gambar'])) {
                            $gambar = $url . 'assets/images/dosen/dosen.png';
                        } else {
                            $gambar = $url . 'assets/images/dosen/' . $s['gambar'];
                        }
                    ?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="team-card">
                                <div class="team-card-img">
                                    <img src="<?= $gambar; ?>" style="width: 100%;" alt="image">
                                </div>
                                <div class="team-card-text">
                                    <h6><?= $s['nama']; ?></h6>
                                    <p><?= $s['jabatan']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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