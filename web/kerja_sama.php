<?php
require_once('../config/koneksi.php');
require_once('../config/menu.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/class_paging.php');
require_once('../config/cek_akses.php');
require_once('../config/crud.php');
$control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
cek_url($url, $proses, 'edit', 'kerja_sama', 'id_jurusan = 0');
$p = $proses->tampil_data_saja('*', 'kerja_sama', '1=1 AND id_jurusan = 0');
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
    <title><?= 'Kerjasama | ' . $control['title']; ?></title>
    <meta name="description" content="<?= 'Kerjasama | ' . $control['deskripsi']; ?>">
    <meta name="keywords" content="<?= $control['keywords']; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>assets/images/fav-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <meta property="og:title" content="<?= 'Kerjasama | ' . $control['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $url; ?>" />
    <meta property="og:image" content="<?= $filename; ?>" />
    <meta property="og:image:secure_url" content="<?= $filename; ?>" />
    <meta property="og:image:width" content="<?= $width; ?>" />
    <meta property="og:image:height" content="<?= $height; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:description" content="<?= 'Kerjasama | ' . $control['deskripsi']; ?>" />
    <meta property="og:site_name" content="<?= 'Kerjasama | ' . $control['deskripsi']; ?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= 'Kerjasama | ' . $control['title']; ?>">
    <meta name="twitter:description" content="<?= 'Kerjasama | ' . $control['deskripsi']; ?>">
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
                <h1 class="mb-0">Kerja Sama</h1>
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
                    <div class="accordion mt-5 mb-5" id="accordionExample">
                        <?php
                        $nomor = 1;
                        $sql = $proses->tampil_data_select('id_prodi,prodi,id_jurusan', 'prodi', '1=1 ORDER BY id_jurusan ASC');
                        foreach ($sql as $row) {

                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $nomor; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $nomor; ?>" aria-expanded="false" aria-controls="collapse<?= $nomor; ?>">
                                        <?= $row['prodi']; ?><i class="fas fa-plus-circle"></i> <i class="fas fa-minus-circle"></i></button>
                                </h2>
                                <div id="collapse<?= $nomor; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $nomor; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <?php
                                            $sql1 = $proses->tampil_data_select('id_bidang,bidang', 'bidang', 'id_jurusan = "' . $row['id_jurusan'] . '"');
                                            foreach ($sql1 as $row1) {
                                            ?>
                                                <h4 class="mt-4"><?= $row1['bidang']; ?></h4>
                                                <table class="table table-bordered table-hover" style="font-size:13px;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="width:3%">No</th>
                                                            <th>Nama Lembaga Mitra</th>
                                                            <th>Tingkat</th>
                                                            <th>Judul dan Ruang Lingkup Kerja Sama</th>
                                                            <th>Manfaat/Output</th>
                                                            <th>Durasi dan Waktu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $num = 1;
                                                        $sql2 = $proses->tampil_data_select('*', 'kerjasama_prodi', 'id_prodi = "' . $row['id_prodi'] . '" AND id_bidang = "' . $row1['id_bidang'] . '"');
                                                        foreach ($sql2 as $row2) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?= $num; ?></td>
                                                                <td><?= $row2['nama_lembaga']; ?></td>
                                                                <td><?= $row2['tingkat']; ?></td>
                                                                <td><?= $row2['judul']; ?></td>
                                                                <td><?= $row2['manfaat']; ?></td>
                                                                <td><?= $row2['durasi']; ?></td>
                                                            </tr>
                                                        <?php $num++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $nomor++;
                        } ?>
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