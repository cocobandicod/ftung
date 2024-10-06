<?php
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
$filename = $url . 'assets/images/logo/' . $control['logo'];
$data = @getimagesize(@$filename);
$width = @$data[0];
$height = @$data[1];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $control['title']; ?></title>
    <meta name="description" content="<?= $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">

    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= $control['deskripsi']; ?>" />
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $control['title']; ?>">
    <meta name="twitter:description" content="<?= $control['deskripsi']; ?>">
    <meta name="twitter:image" content="<?= $filename; ?>">

    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsome.min.css">
    <link rel="stylesheet" href="assets/fonts/flaticon.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

    <?= header_web($proses, $url); ?>

    <section class="uni-banner">
        <!-- slider-area -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $no = 1;
                $p = $proses->tampil_data_select('*', 'banner', '1=1 AND ket = "fakultas" AND jenis = "Fakultas" AND publish = "Yes" ORDER BY urutan ASC');
                foreach ($p as $pr) {
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

    <section class="fun-facts pt-70 pb-100" style="background-color:#041c3b;">
        <div class="container">
            <div class="row">
                <h3 class="text-white text-center">VISI 2035 "Menjadi Fakultas yang Unggul dan Berdaya Saing dalam Pengembangan Bidang Keteknikan berbasis Potensi Kawasan di Wilayah Timur Indonesia"</h3>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card">
                        <i class="flaticon-smart-city"></i>
                        <h2><span class="odometer" data-count="<?= $control['program_studi']; ?>">00</span></h2>
                        <p>Program Studi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card">
                        <i class="flaticon-man-user"></i>
                        <h2>
                            <span class="odometer" data-count="<?= $control['mahasiswa']; ?>">00</span>
                            <span class="sign-icon">±</span>
                        </h2>
                        <p>Mahasiswa</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card">
                        <i class="flaticon-guaranteed"></i>
                        <h2>
                            <span class="odometer" data-count="<?= $control['lulusan']; ?>">00</span>
                            <span class="sign-icon">±</span>
                        </h2>
                        <p>Lulusan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="fun-facts-card last-card">
                        <i class="flaticon-award"></i>
                        <h2>
                            <span class="odometer" data-count="<?= $control['tenaga_pengajar']; ?>">00</span>
                            <span class="sign-icon">±</span>
                        </h2>
                        <p>Tenaga Pengajar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services pt-70 pb-70">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>Informasi</h3>
                <p>Berita/Informasi/Pengumuman</p>
            </div>
            <div class="section-content">
                <div class="service-slider-area-1 owl-carousel">
                    <?php
                    $sql = $proses->tampil_data_select('*', 'berita', 'publish = "Yes" ORDER BY tanggal DESC, id DESC LIMIT 6');
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


    <section class="we-are bg-f9fbfe">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="why-we-img">
                        <img src="<?= $url; ?>assets/images/mahasiswa.png" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="why-we-text-area">
                        <div class="default-section-title">
                            <h3>Jurusan/Program Studi</h3>
                            <p>Fakultas Teknik terdiri dari 6 Jurusan dan 11 Program Studi Terakreditasi</p>
                        </div>
                        <div class="why-we-text-list">
                            <i class="flaticon-government-building"></i>
                            <h4>Teknik Sipil</h4>
                            <ul>
                                <li>Prodi S1 Teknik Sipil <span class="badge bg-warning text-dark">B</span></li>
                                <li>Prodi S1 Pendidikan Vokasional Konstruksi Bangunan <span class="badge bg-warning text-dark">Baik Sekali</span></li>
                            </ul>
                        </div>
                        <div class="why-we-text-list">
                            <i class="flaticon-government-building"></i>
                            <h4>Teknik Elektro & Komputer</h4>
                            <ul>
                                <li>Prodi S1 Teknik Elektro <span class="badge bg-warning text-dark">B</span></li>
                                <li>Prodi S1 Teknik Komputer</li>
                            </ul>
                        </div>
                        <div class="why-we-text-list">
                            <i class="flaticon-government-building"></i>
                            <h4>Teknik Informatika</h4>
                            <ul>
                                <li>Prodi S1 Sistem Informasi <span class="badge bg-warning text-dark">B</span></li>
                                <li>Prodi S1 Pendidikan Teknologi Informasi <span class="badge bg-warning text-dark">Unggul</span></li>
                            </ul>
                        </div>
                        <div class="why-we-text-list">
                            <i class="flaticon-government-building"></i>
                            <h4>Teknik Arsitektur</h4>
                            <ul>
                                <li>Prodi S1 Teknik Arsitektur <span class="badge bg-warning text-dark">Baik Sekali</span></li>
                                <li>Prodi S1 Perencanaan Wilayah Perkotaan <span class="badge bg-warning text-dark">Baik</span></li>
                            </ul>
                        </div>
                        <div class="why-we-text-list">
                            <i class="flaticon-government-building"></i>
                            <h4>Teknik Industri</h4>
                            <ul>
                                <li>Prodi S1 Teknik Industri <span class="badge bg-warning text-dark">B</span></li>
                                <li>Prodi S1 Pendidikan Teknik Mesin <span class="badge bg-warning text-dark">Unggul</span></li>
                            </ul>
                        </div>
                        <div class="why-we-text-list">
                            <i class="flaticon-government-building"></i>
                            <h4>Seni Rupa</h4>
                            <ul>
                                <li>Prodi S1 Pendidikan Seni Rupa <span class="badge bg-warning text-dark">Unggul</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="explore-event explore-event-1">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="explore-events-text-area">
                            <div class="default-section-title">
                                <h3>Kuliah di Fakultas Teknik</h3>
                                <p style="text-align:justify;">Mengapa harus kuliah di Fakultas Teknik? yang pertama Memiliki ilmu dan terapan yang lebih luas, kedua Memiliki kesempatan bekerja yang lebih luas, ketiga Lulusan memiliki mental dan fisik yang bagus. Prospek karir yang lebih cerah sangat menunggu Anda yang memutuskan untuk masuk jurusan Teknik. Daya saing yang tinggi membuat rebutan kursi di kampus juga tak kalah sengit. Anda harus bisa mengalahkan ribuan orang yang ingin masuk ke jurusan yang sama dari seluruh penjuru nusantara. Pastikan Anda menyiapkan diri untuk mengikuti tes masuk ke jurusan prestise ini, ya!</p>
                            </div>
                            <div class="explore-events-text-list">
                                <i class="flaticon-checked-1"></i>
                                <h4>SNBT</h4>
                                <p style="text-align:justify;">Seleksi Nasional Berbasis Tes (SNBT) dilakukan berdasarkan hasil Ujian Tulis Berbasis Komputer (UTBK) dan dapat ditambah dengan kriteria lain sesuai dengan talenta khusus yang ditetapkan UNG. Ujian Tulis Berbasis Komputer (UTBK) terdiri atas: 1) tes potensi skolastik, yaitu tes yang bertujuan untuk mengukur kemampuan kognitif yang diperlukan bagi calon mahasiswa yang diprediksi mampu menyelesaikan studi di perguruan tinggi; dan 2) tes kompetensi akademik.</p>
                                <i class="flaticon-checked-1"></i>
                                <h4>SNBP</h4>
                                <p style="text-align:justify;">Seleksi Nasional Berbasis Prestasi (SNBP) dilakukan berdasarkan hasil penelusuran prestasi akademik, nonakademik, dan/atau portofolio calon mahasiswa. Penelusuran prestasi akademik, nonakademik, dan/atau portofolio calon mahasiswa merupakan seleksi atas: a. nilai rapor peserta didik pendidikan menengah atau sederajat yang berasal dari seluruh sekolah di seluruh wilayah Indonesia; dan/atau b. prestasi nonakademik peserta didik pendidikan menengah atau sederajat.</p>
                                <i class="flaticon-checked-1"></i>
                                <h4>MANDIRI</h4>
                                <p style="text-align:justify;">Seleksi Mandiri (SM) merupakan seleksi penerimaan mahasiswa baru dengan menggunakan hasil Tes Berbasis Komputer (Computer Based Test–CBT), dan/atau portofolio prestasi unggul akademik/non akademik yang dilaksanakan dan ditetapkan oleh UNG, dan dapat ditambah dengan kriteria lain (misalnya talenta khusus) yang ditetapkan UNG.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="explore-events-img">
                            <img src="assets/images/gedung.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team ptb-100 bg-f9fbfe">
        <div class="container">
            <div class="default-section-title default-section-title-middle">
                <h3>Pimpinan Fakultas</h3>
                <p>Pimpinan Fakultas Teknik Universitas Negeri Gorontalo</p>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <?php
                    $sql = $proses->tampil_data_select('nama,jabatan,gambar', 'struktur_organisasi', 'id_jurusan = 0');
                    foreach ($sql as $s) {
                    ?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="team-card">
                                <div class="team-card-img">
                                    <img src="<?= $url; ?>assets/images/dosen/<?= $s['gambar']; ?>" alt="image">
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

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/meanmenu.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/TweenMax.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.js"></script>
    <script src="assets/js/ajaxchimp.min.js"></script>
    <script src="assets/js/owl.carousel2.thumbs.min.js"></script>
    <script src="assets/js/appear.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>