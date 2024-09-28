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
    <title><?= 'Dosen | ' . $control['title']; ?></title>
    <meta name="description" content="<?= 'Dosen | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= 'Dosen | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= 'Dosen | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= 'Dosen | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= 'Dosen | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= 'Dosen | ' . $control['deskripsi']; ?>">
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
                <h1 class="mb-0">Tenaga Pengajar</h1>
                <ul>
                    <li class="text-white me-0">Fakultas Teknik</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="blog-details pt-5 pb-5">
        <div class="container">
            <div class="col-lg-11 me-auto ms-auto">
                <div class="default-section-title row">
                    <?php
                    $p      = new paging;
                    $batas  = 15;
                    $posisi = $p->cariPosisi($batas);
                    $no = $posisi + 1;
                    $sql = $proses->tampil_data_berita('*', 'data_dosen', '1=1 ORDER BY id_dosen ASC', $posisi, $batas);
                    foreach ($sql as $row) {
                        if ($row['id_sinta'] == NULL) {
                            $sinta = '';
                            $link = '#';
                        } else {
                            $sinta = '<a href="https://sinta.kemdikbud.go.id/authors/profile/' . $row['id_sinta'] . '" class="me-1" target="_blank">sinta</a>';
                            $link = $url . 'dosen/' . $row['nidn'];
                        }
                        if ($row['id_scholar'] == NULL) {
                            $scholar = '';
                            $gambar = $url . 'assets/images/dosen/dosen_kecil.jpg';
                        } else {
                            $scholar = '<a href="https://scholar.google.com/citations?user=' . $row['id_scholar'] . '&hl=id&oi=sra" class="me-1" target="_blank">scholar</a>';
                            $gambar = 'https://scholar.googleusercontent.com/citations?view_op=view_photo&user=' . $row['id_scholar'] . '&citpid=1';
                        }
                    ?>
                        <div class="col-xl-4 mb-3">
                            <div class="recent-news-card row">
                                <div class="col-3 ps-0">
                                    <div class="blog-thumb3">
                                        <a href="<?= $link; ?>"><img src="<?= $gambar; ?>" style="object-fit:cover;" alt="image"></a>
                                    </div>
                                </div>
                                <div class="col-9 ps-0">
                                    <p class="mb-0 mt-0 hitam"><b><a href="<?= $link; ?>"><?= $row['nama']; ?></a></b></p>
                                    <small><?= $row['nidn']; ?></small>
                                    <p class="p-0 m-0"><small class="badge bg-warning text-dark"><?= $row['jabatan_akademik']; ?></small></p>
                                    <small><?= $scholar . $sinta; ?></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="paginations mt-30 mb-30">
                    <ul>
                        <?php
                        $jmldata     = $proses->cek_count('data_dosen', '1=1 ORDER BY id_dosen ASC');
                        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                        $linkHalaman = $p->navHalaman(@$_GET['hal'], $jmlhalaman, $url . @$_GET['menu']);
                        echo $linkHalaman;
                        ?>
                    </ul>
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