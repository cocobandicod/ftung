<?php
session_start();
function navbar($url2)
{
?>
    <div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
        <div class="container-fluid">
            <div class="d-flex d-lg-none me-2">
                <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                    <i class="ph-list"></i>
                </button>
            </div>

            <div class="navbar-brand flex-1 flex-lg-0">
                <a href="#" class="d-inline-flex align-items-center">
                    <img src="<?= $url2; ?>assets/images/logo.png" alt="">
                </a>
            </div>

            <ul class="nav flex-row justify-content-end order-1 order-lg-2">

                <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                    <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                        <div class="status-indicator-container">
                            <img src="<?= $url2; ?>assets/images/avatar-1.jpg" class="w-32px h-32px rounded-pill" alt="">
                            <span class="status-indicator bg-success"></span>
                        </div>
                        <span class="d-none d-lg-inline-block mx-lg-2"><?= $_SESSION['nama']; ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="<?= $url2; ?>profile" class="dropdown-item">
                            <i class="ph-user-circle me-2"></i>
                            My Profile
                        </a>
                        <?php
                        if ($_SESSION['level'] == 'Admin') {
                        ?>
                            <a href="<?= $url2; ?>operator" class="dropdown-item">
                                <i class="ph-users-three me-2"></i>
                                Operator
                            </a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?= $url2; ?>ganti/password" class="dropdown-item">
                            <i class="ph-key me-2"></i>
                            Ganti Password
                        </a>
                        <a href="<?= $url2; ?>logout" class="dropdown-item">
                            <i class="ph-sign-out me-2"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php
}
function menu($proses, $url2)
{
?>
    <!-- Sidebar header -->
    <div class="sidebar-section">
        <div class="sidebar-section-body d-flex justify-content-center">
            <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

            <div>
                <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>

                <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- /sidebar header -->

    <div class="sidebar-section">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            <li class="nav-item-header pt-3">
                <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Menu Utama</div>
                <i class="ph-dots-three sidebar-resize-show"></i>
            </li>
            <li class="nav-item">
                <a href="<?= $url2; ?>beranda" class="nav-link <?= @$_GET['aktif1']; ?>">
                    <i class="ph-house"></i>
                    <span>
                        Beranda
                    </span>
                </a>
            </li>
            <?php
            if ($_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>profil" class="nav-link <?= @$_GET['aktif2']; ?>">
                        <i class="ph-cards"></i>
                        <span>
                            Profil Fakultas
                        </span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link <?= @$_GET['aktif19']; ?>">
                    <i class="ph-cards"></i>
                    <span>Profil Jurusan</span>
                </a>
                <ul class="nav-group-sub collapse">
                    <?php
                    if ($_SESSION['level'] == 'Operator') {
                        $sql = $proses->tampil_data_select('*', 'jurusan', 'id_jurusan = "' . $_SESSION['id_jurusan'] . '" AND link = "No"');
                    } else {
                        $sql = $proses->tampil_data_select('*', 'jurusan', 'id_jurusan != 0 AND link = "No"');
                    }
                    $no = 1;
                    foreach ($sql as $b) {
                        $link = $url2 . 'profil/jurusan/' . $b['seo'];
                    ?>
                        <li class="nav-item"><a href="<?= $link; ?>" class="nav-link"><?= @$b['nama_jurusan']; ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <?php
            if ($_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>ppid" class="nav-link <?= @$_GET['aktif3']; ?>">
                        <i class="ph-cards"></i>
                        <span>
                            PPID
                        </span>
                    </a>
                </li>
            <?php
            }
            if ($_SESSION['level'] == 'Operator') {
            ?>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link <?= @$_GET['aktif22']; ?>">
                        <i class="ph-circles-four"></i>
                        <span>Laboratorium</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <a href="<?= $url2; ?>laboratorium/profil" class="nav-link <?= @$_GET['aktif_221']; ?>">Profil</a>
                        <a href="<?= $url2; ?>laboratorium/info-laboratorium" class="nav-link <?= @$_GET['aktif_222']; ?>">Info Laboratorium</a>
                        <a href="<?= $url2; ?>laboratorium/informasi" class="nav-link <?= @$_GET['aktif_223']; ?>">Informasi</a>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link <?= @$_GET['aktif_224']; ?>">Download</a>
                            <ul class="nav-group-sub collapse">
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/proposal-praktikum" class="nav-link <?= @$_GET['aktif_2241']; ?>">Proposal Praktikum</a></li>
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/laporan-praktikum" class="nav-link <?= @$_GET['aktif_2242']; ?>">Laporan Praktikum</a></li>
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/tugas-mahasiswa" class="nav-link <?= @$_GET['aktif_2243']; ?>">Tugas Mahasiswa</a></li>
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/skripsi-mahasiswa" class="nav-link <?= @$_GET['aktif_2244']; ?>">Skripsi Mahasiswa</a></li>
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/penelitian-dosen" class="nav-link <?= @$_GET['aktif_2245']; ?>">Penelitian Dosen</a></li>
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/surat-masuk" class="nav-link <?= @$_GET['aktif_2246']; ?>">Surat Masuk</a></li>
                                <li class="nav-item"><a href="<?= $url2; ?>laboratorium/download/surat-keluar" class="nav-link <?= @$_GET['aktif_2247']; ?>">Surat Keluar</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>
            <?php } else {
            } ?>
            <li class="nav-item">
                <a href="<?= $url2; ?>jurusan" class="nav-link <?= @$_GET['aktif16']; ?>">
                    <i class="ph-buildings"></i>
                    <span>
                        Jurusan
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= $url2; ?>prodi" class="nav-link <?= @$_GET['aktif17']; ?>">
                    <i class="ph-chalkboard-teacher"></i>
                    <span>
                        Program Studi
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= $url2; ?>pimpinan" class="nav-link <?= @$_GET['aktif20']; ?>">
                    <i class="ph-users-three"></i>
                    <span>
                        Pimpinan
                    </span>
                </a>
            </li>
            <?php
            if ($_SESSION['level'] == 'Operator' or $_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>berita" class="nav-link <?= @$_GET['aktif4']; ?>">
                        <i class="ph-newspaper-clipping"></i>
                        <span>
                            Berita
                        </span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="<?= $url2; ?>dosen" class="nav-link <?= @$_GET['aktif6']; ?>">
                    <i class="ph-address-book"></i>
                    <span>Dosen</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= $url2; ?>pegawai" class="nav-link <?= @$_GET['aktif7']; ?>">
                    <i class="ph-address-book"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <?php
            if ($_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>kebijakan" class="nav-link <?= @$_GET['aktif5']; ?>">
                        <i class="ph-hand-palm"></i>
                        <span>
                            Kebijakan
                        </span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="<?= $url2; ?>akreditasi" class="nav-link <?= @$_GET['aktif18']; ?>">
                    <i class="ph-shield-star"></i>
                    <span>
                        Akreditasi
                    </span>
                </a>
            </li>
            <?php
            if ($_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>banner" class="nav-link <?= @$_GET['aktif8']; ?>">
                        <i class="ph-flag-banner"></i>
                        <span>
                            Banner
                        </span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="<?= $url2; ?>fasilitas" class="nav-link <?= @$_GET['aktif9']; ?>">
                    <i class="ph-image"></i>
                    <span>
                        Fasilitas
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= $url2; ?>alumni" class="nav-link <?= @$_GET['aktif10']; ?>">
                    <i class="ph-graduation-cap"></i>
                    <span>
                        Alumni
                    </span>
                </a>
            </li>
            <?php
            if ($_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>penelitian" class="nav-link <?= @$_GET['aktif11']; ?>">
                        <i class="ph-laptop"></i>
                        <span>
                            Penelitian
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url2; ?>pengabdian" class="nav-link <?= @$_GET['aktif12']; ?>">
                        <i class="ph-calendar-check"></i>
                        <span>
                            Pengabdian
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url2; ?>kerjasama" class="nav-link <?= @$_GET['aktif13']; ?>">
                        <i class="ph-handshake"></i>
                        <span>
                            Kerja Sama
                        </span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="<?= $url2; ?>jurnal" class="nav-link <?= @$_GET['aktif14']; ?>">
                    <i class="ph-book-open"></i>
                    <span>
                        Jurnal
                    </span>
                </a>
            </li>
            <?php
            if ($_SESSION['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a href="<?= $url2; ?>penjamu" class="nav-link <?= @$_GET['aktif15']; ?>">
                        <i class="ph-stack-overflow-logo"></i>
                        <span>
                            Penjamu
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url2; ?>dwp" class="nav-link <?= @$_GET['aktif21']; ?>">
                        <i class="ph-users-four"></i>
                        <span>
                            Dharma Wanita
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $url2; ?>pengaturan" class="nav-link <?= @$_GET['aktif12']; ?>">
                        <i class="ph-wrench"></i>
                        <span>
                            Pengaturan
                        </span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php
}
function header_web($proses, $url)
{
    $control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
?>
    <section class="topbar plr-100 bg-bluedark">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="topbar-left-area">
                        <ul>
                            <li><a href="https://www.ung.ac.id"><i class="fas fa-home"></i> <span>Universitas Negeri Gorontalo</span></a></li>
                            <li><a href="mailto:<?= $control['email']; ?>"><i class="fas fa-envelope"></i> <span><?= $control['email']; ?></span></a></li>
                            <li><a href="#"><i class="fas fa-phone"></i><?= $control['telepon']; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="topbar-right-area">
                        <ul>
                            <li><a href="<?= $url; ?>ppid">PPID</a></li>
                            <li><a href="<?= $url; ?>dosen">Dosen</a></li>
                            <li><a href="<?= $url; ?>pegawai">Pegawai</a></li>
                            <li><a href="<?= $url; ?>alumni">Alumni</a></li>
                            <li><a href="<?= $url; ?>kerjasama">Kerjasama</a></li>
                            <li><a href="<?= $url; ?>prestasi">Prestasi</a></li>
                            <li><a href="<?= $url; ?>penelitian">Penelitian</a></li>
                            <li><a href="<?= $url; ?>pengabdian">Pengabdian</a></li>
                            <!-- <li><a href="<?= $url; ?>dwp">Dharma Wanita</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="navbar-area">

        <div class="main-responsive-nav">
            <div class="container-fluid plr-100">
                <div class="mobile-nav">
                    <a href="<?= $url; ?>home" class="logo"><img src="<?= $url; ?>assets/images/small-logo.png" alt="logo" /></a>
                </div>
            </div>
        </div>

        <div class="main-nav plr-100">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= $url; ?>home">
                        <img src="<?= $url; ?>assets/images/logo.png" alt="logo" />
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="<?= $url; ?>" class="nav-link <?= @$_GET['aktif1']; ?>">HOME</a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif2']; ?>">PROFIL</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url; ?>sejarah" class="nav-link <?= @$_GET['aktif_21']; ?>">Sejarah</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>struktur-organisasi" class="nav-link <?= @$_GET['aktif_22']; ?>">Struktur Organisasi</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>pimpinan-fakultas" class="nav-link <?= @$_GET['aktif_23']; ?>">Pimpinan Fakultas</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>fasilitas" class="nav-link <?= @$_GET['aktif_24']; ?>">Fasilitas</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>akreditasi" class="nav-link <?= @$_GET['aktif_25']; ?>">Akreditasi</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif3']; ?>">JURUSAN</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $sql = $proses->tampil_data_select('*', 'jurusan', 'id_jurusan != 0');
                                    $no = 1;
                                    foreach ($sql as $b) {
                                        if ($b['link'] == 'Yes') {
                                            $link = $b['seo'];
                                        } else {
                                            $link = $url . 'jurusan/' . $b['seo'];
                                        }
                                    ?>
                                        <li class="nav-item"><a href="<?= $link; ?>" class="nav-link <?= @$_GET['aktif_3' . $no]; ?>"><?= $b['nama_jurusan']; ?></a></li>
                                    <?php ++$no;
                                    } ?>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?= $url; ?>informasi" class="nav-link <?= @$_GET['aktif4']; ?>">INFORMASI</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif5']; ?>">AKADEMIK</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url; ?>kalender-akademik" class="nav-link <?= @$_GET['aktif_51']; ?>">Kalender Akademik</a></li>
                                    <li class="nav-item"><a href="https://siat.ung.ac.id" target="_blank" class="nav-link">Sistem Informasi Akademik (SIAT)</a></li>
                                    <li class="nav-item"><a href="https://spada.ung.ac.id/" target="_blank" class="nav-link">Pembelajaran Online (SPADA)</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?= $url; ?>layanan" class="nav-link <?= @$_GET['aktif6']; ?>">LAYANAN</a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif7']; ?>">KEBIJAKAN</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url; ?>kebijakan/fakultas" class="nav-link <?= @$_GET['aktif_71']; ?>">Fakultas</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>kebijakan/pemerintah-pusat" class="nav-link <?= @$_GET['aktif_72']; ?>">Pemerintah Pusat</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>kebijakan/universitas" class="nav-link <?= @$_GET['aktif_73']; ?>">Universitas</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">JURNAL</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $sql = $proses->tampil_data_select('*', 'link_jurnal', '1=1 ORDER BY id_jurusan ASC');
                                    foreach ($sql as $b) {
                                    ?>
                                        <li class="nav-item"><a href="<?= $b['link']; ?>" class="nav-link" target="_blank"><?= $b['jurnal']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?= $url; ?>penjamu" class="nav-link <?= @$_GET['aktif8']; ?>">PENJAMU</a></li>
                        </ul>
                        <div class="menu-sidebar">
                            <ul>
                                <li><button class="popup-button"><i class="fas fa-search"></i></button></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<?php
}
function header_web_jurusan($proses, $url, $seo, $id_jurusan)
{
    $control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
?>
    <section class="topbar plr-100 bg-bluedark">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="topbar-left-area">
                        <ul>
                            <li><a href="https://www.ung.ac.id"><i class="fas fa-home"></i> <span>Universitas Negeri Gorontalo</span></a></li>
                            <li><a href="mailto:<?= $control['email']; ?>"><i class="fas fa-envelope"></i> <span><?= $control['email']; ?></span></a></li>
                            <li><a href="#"><i class="fas fa-phone"></i><?= $control['telepon']; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="topbar-right-area">
                        <ul>
                            <li><a href="<?= $url; ?>">Fakultas Teknik</a></li>
                            <li><a href="<?= $url; ?>ppid">PPID</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/dosen">Dosen</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/pegawai">Pegawai</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/alumni">Alumni</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/kerjasama">Kerjasama</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/prestasi">Prestasi</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/penelitian">Penelitian</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/pengabdian">Pengabdian</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="navbar-area">

        <div class="main-responsive-nav">
            <div class="container-fluid plr-100">
                <div class="mobile-nav">
                    <a href="<?= $url; ?>home" class="logo"><img src="<?= $url; ?>assets/images/small-logo.png" alt="logo" /></a>
                </div>
            </div>
        </div>

        <div class="main-nav plr-100">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= $url; ?>home">
                        <img src="<?= $url; ?>assets/images/logo.png" alt="logo" />
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>" class="nav-link <?= @$_GET['aktif1']; ?>">HOME</a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif2']; ?>">PROFIL</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/sejarah" class="nav-link <?= @$_GET['aktif_26']; ?>">Sejarah</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/struktur-organisasi" class="nav-link <?= @$_GET['aktif_21']; ?>">Struktur Organisasi</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/pimpinan-jurusan" class="nav-link <?= @$_GET['aktif_22']; ?>">Pimpinan Jurusan</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/fasilitas" class="nav-link <?= @$_GET['aktif_23']; ?>">Fasilitas</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/akreditasi" class="nav-link <?= @$_GET['aktif_24']; ?>">Akreditasi</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/contact" class="nav-link <?= @$_GET['aktif_27']; ?>">Contact</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif3']; ?>">PROGRAM STUDI</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $sql = $proses->tampil_data_select('*', 'prodi', 'id_jurusan = ' . $id_jurusan . '');
                                    $no = 1;
                                    foreach ($sql as $b) {
                                        if ($b['link'] == 'Yes') {
                                            $link = $b['seo_prodi'];
                                        } else {
                                            $link = $url . 'prodi/' . $b['seo_prodi'];
                                        }
                                    ?>
                                        <li class="nav-item"><a href="<?= $link; ?>" class="nav-link"><?= $b['prodi']; ?></a></li>
                                    <?php ++$no;
                                    } ?>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/informasi" class="nav-link <?= @$_GET['aktif4']; ?>">INFORMASI</a></li>
                            <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/kurikulum" class="nav-link <?= @$_GET['aktif5']; ?>">KURIKULUM</a></li>
                            <li class="nav-item"><a href="<?= $url . 'jurusan/' . $seo; ?>/mahasiswa" class="nav-link <?= @$_GET['aktif6']; ?>">MAHASISWA</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">JURNAL</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $sql = $proses->tampil_data_select('*', 'link_jurnal', '1=1 AND id_jurusan = ' . $id_jurusan . '');
                                    foreach ($sql as $b) {
                                    ?>
                                        <li class="nav-item"><a href="<?= $b['link']; ?>" class="nav-link" target="_blank"><?= $b['jurnal']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>" class="nav-link <?= @$_GET['aktif7']; ?>">LABORATORIUM</a></li>
                        </ul>
                        <div class="menu-sidebar">
                            <ul>
                                <li><button class="popup-button"><i class="fas fa-search"></i></button></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<?php
}
function header_lab_jurusan($proses, $url, $seo, $id_jurusan)
{
    $control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
?>
    <section class="topbar plr-100 bg-bluedark">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="topbar-left-area">
                        <ul>
                            <li><a href="https://www.ung.ac.id"><i class="fas fa-home"></i> <span>Universitas Negeri Gorontalo</span></a></li>
                            <li><a href="mailto:<?= $control['email']; ?>"><i class="fas fa-envelope"></i> <span><?= $control['email']; ?></span></a></li>
                            <li><a href="#"><i class="fas fa-phone"></i><?= $control['telepon']; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="topbar-right-area">
                        <ul>
                            <li><a href="<?= $url; ?>">Fakultas Teknik</a></li>
                            <li><a href="<?= $url; ?>ppid">PPID</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/dosen">Dosen</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/pegawai">Pegawai</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/alumni">Alumni</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/kerjasama">Kerjasama</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/prestasi">Prestasi</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/penelitian">Penelitian</a></li>
                            <li><a href="<?= $url . 'jurusan/' . $seo; ?>/pengabdian">Pengabdian</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="navbar-area">

        <div class="main-responsive-nav">
            <div class="container-fluid plr-100">
                <div class="mobile-nav">
                    <a href="<?= $url; ?>home" class="logo"><img src="<?= $url; ?>assets/images/small-logo.png" alt="logo" /></a>
                </div>
            </div>
        </div>

        <div class="main-nav plr-100">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= $url; ?>home">
                        <img src="<?= $url; ?>assets/images/logo.png" alt="logo" />
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>" class="nav-link <?= @$_GET['aktif1']; ?>">HOME</a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif2']; ?>">PROFIL</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/struktur-organisasi" class="nav-link <?= @$_GET['aktif_21']; ?>">Struktur Organisasi</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/visi-misi" class="nav-link <?= @$_GET['aktif_22']; ?>">Visi-Misi</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/contact" class="nav-link <?= @$_GET['aktif_23']; ?>">Contact</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif3']; ?>">INFO LABORATORIUM</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/peraturan" class="nav-link <?= @$_GET['aktif_31']; ?>">Peraturan Laboratorium</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/jadwal" class="nav-link <?= @$_GET['aktif_32']; ?>">Jadwal Laboratorium</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/prosedur-peminjaman-lab" class="nav-link <?= @$_GET['aktif_33']; ?>">Prosedur Peminjaman Laboratorium</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/prosedur-peminjaman-alat" class="nav-link <?= @$_GET['aktif_34']; ?>">Prosedur Peminjaman Alat Laboratorium</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/prosedur-penggunaan-bahan" class="nav-link <?= @$_GET['aktif_35']; ?>">Prosedur Penggunaan Bahan</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/prosedur-penggunaan-alat" class="nav-link <?= @$_GET['aktif_36']; ?>">Prosedur Penggunaan Alat</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/informasi" class="nav-link <?= @$_GET['aktif4']; ?>">BERITA</a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif5']; ?>">INFORMASI</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/dokumentasi-praktikum" class="nav-link <?= @$_GET['aktif_51']; ?>">Dokumentasi Praktikum</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/kegiatan-laboratorium" class="nav-link <?= @$_GET['aktif_52']; ?>">Kegiatan Laboratorium</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/kejuaraan" class="nav-link <?= @$_GET['aktif_53']; ?>">Kejuaraan</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/peralatan-laboratorium" class="nav-link <?= @$_GET['aktif_54']; ?>">Peralatan Laboratorium</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/bahan" class="nav-link <?= @$_GET['aktif_55']; ?>">Bahan</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/hasil-karya-mahasiswa" class="nav-link <?= @$_GET['aktif_56']; ?>">Hasil Karya & Tugas Mahasiswa</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/hasil-penelitian-mahasiswa" class="nav-link <?= @$_GET['aktif_57']; ?>">Hasil Penelitian Mahasiswa</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/hasil-penelitian-dosen" class="nav-link <?= @$_GET['aktif_58']; ?>">Hasil Penelitian Dosen</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif6']; ?>">DOWNLOAD</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/proposal-praktikum" class="nav-link <?= @$_GET['aktif_61']; ?>">Proposal Praktikum</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/laporan-praktikum" class="nav-link <?= @$_GET['aktif_62']; ?>">Laporan Praktikum</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/tugas-mahasiswa" class="nav-link <?= @$_GET['aktif_63']; ?>">Tugas Mahasiswa</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/skripsi-mahasiswa" class="nav-link <?= @$_GET['aktif_64']; ?>">Skripsi Mahasiswa</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/penelitian-dosen" class="nav-link <?= @$_GET['aktif_65']; ?>">Penelitian Dosen</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/surat-masuk" class="nav-link <?= @$_GET['aktif_66']; ?>">Surat Masuk</a></li>
                                    <li class="nav-item"><a href="<?= $url . 'laboratorium/' . $seo; ?>/surat-keluar" class="nav-link <?= @$_GET['aktif_67']; ?>">Surat Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-sidebar">
                            <ul>
                                <li><button class="popup-button"><i class="fas fa-search"></i></button></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<?php
}
function header_web_ppid($proses, $url)
{
    $control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
?>
    <section class="topbar plr-100 bg-bluedark">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="topbar-left-area">
                        <ul>
                            <li><a href="https://www.ung.ac.id"><i class="fas fa-home"></i> <span>Universitas Negeri Gorontalo</span></a></li>
                            <li><a href="mailto:<?= $control['email']; ?>"><i class="fas fa-envelope"></i> <span><?= $control['email']; ?></span></a></li>
                            <li><a href="#"><i class="fas fa-phone"></i><?= $control['telepon']; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="navbar-area">

        <div class="main-responsive-nav">
            <div class="container-fluid plr-100">
                <div class="mobile-nav">
                    <a href="<?= $url; ?>home" class="logo"><img src="<?= $url; ?>assets/images/small-logo.png" alt="logo" /></a>
                </div>
            </div>
        </div>

        <div class="main-nav plr-100">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= $url; ?>home">
                        <img src="<?= $url; ?>assets/images/logo.png" alt="logo" />
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="<?= $url; ?>ppid" class="nav-link <?= @$_GET['aktif1']; ?>">HOME</a></li>
                            <li class="nav-item"><a href="<?= $url; ?>ppid/akreditasi" class="nav-link <?= @$_GET['aktif2']; ?>">AKREDITASI</a></li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif2']; ?>">INFORMASI PUBLIK</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url; ?>sejarah" class="nav-link <?= @$_GET['aktif_21']; ?>">Informasi Wajib Berkala</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>struktur/organisasi" class="nav-link <?= @$_GET['aktif_22']; ?>">Informasi Wajib Sedia Setiap Saat</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>pimpinan/fakultas" class="nav-link <?= @$_GET['aktif_23']; ?>">Informasi Publik Dikecualikan</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>fasilitas" class="nav-link <?= @$_GET['aktif_24']; ?>">Informasi Publik Diumumkan Secara Serta Merta</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif5']; ?>">DASAR HUKUM</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url; ?>kalender/akademik" class="nav-link <?= @$_GET['aktif_51']; ?>">Peraturan Tentang Keterbukaan Informasi Publik</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>kalender/akademik" class="nav-link <?= @$_GET['aktif_51']; ?>">Keterbukaan Informasi di UNG</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link dropdown-toggle <?= @$_GET['aktif7']; ?>">LAYANAN</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="<?= $url; ?>kebijakan/fakultas" class="nav-link">Permohonan Informasi Publik</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>kebijakan/pemerintah/pusat" class="nav-link">Pengajuan Keberatan Informasi Publik</a></li>
                                    <li class="nav-item"><a href="<?= $url; ?>kebijakan/universitas" class="nav-link">Layanan Pengaduan</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-sidebar">
                            <ul>
                                <li><button class="popup-button"><i class="fas fa-search"></i></button></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<?php }
function footer($proses, $url)
{
    $control = $proses->tampil_data_saja('*', 'pengaturan', '1=1');
?>
    <section class="footer">
        <div class="container">
            <div class="footer-content ptb-100">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="footer-logo-area text-white">
                            <a href="index-2.html"><img src="<?= $url; ?>assets/images/white-logo.png" alt="image"></a>
                            <p><?= $control['alamat']; ?></p>
                            <div class="footer-contact-card">
                                <i class="fas fa-phone-alt"></i>
                                <h5><?= $control['telepon']; ?></h5>
                            </div>
                            <div class="footer-contact-card">
                                <i class="fas fa-envelope"></i>
                                <h5><?= $control['email']; ?></h5>
                            </div>
                            <div class="footer-social-area pt-3">
                                <ul>
                                    <li><span>Follow Us: </span></li>
                                    <li><a href="https://www.facebook.com/<?= $control['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/<?= $control['instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.twitter.com/<?= $control['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?= $control['maps']; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-links footer-quick-links">
                            <h3>Links</h3>
                            <ul>
                                <li><i class="fas fa-angle-right"></i> <a href="https://www.ung.ac.id/" target="_blank">Universitas Negeri Gorontalo</a> </li>
                                <li><i class="fas fa-angle-right"></i> <a href="https://siat.ung.ac.id/" target="_blank">Sistem Informasi Akademik</a></li>
                                <li><i class="fas fa-angle-right"></i> <a href="https://repository.ung.ac.id/" target="_blank">Repository UNG</a></li>
                                <li><i class="fas fa-angle-right"></i> <a href="http://pmb.ung.ac.id/" target="_blank">Penerimaan Mahasiswa Baru</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>© <?= date('Y'); ?> <strong>Fakultas Teknik</strong> Universitas Negeri Gorontalo</p>
            </div>
        </div>
    </section>
    <div class="popup">
        <div class="popup-content">
            <button class="close-btn" id="popup-close"><i class="fas fa-times"></i></button>
            <form role="search" method="GET" action="<?= $url; ?>search/">
                <div class="input-group search-box">
                    <input type="text" name="keyword" class="form-control" placeholder="Search" required>
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="go-top"><i class="fas fa-chevron-up"></i></div>
<?php } ?>