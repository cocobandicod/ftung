<?php
require_once('config/koneksi.php');
require_once('config/fungsi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="assets/ico/favicon.png">
<title>Fakultas Teknik Repository</title>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/owl.theme.css" rel="stylesheet">
<script>
        paceOptions = {
            elements: true
        };
</script>
<script src="assets/js/pace.min.js"></script>
<style>.themeControll{background:#2d3e50;height:auto;width:170px;position:fixed;left:0;padding:20px 0;top:100px;z-index:999999;-webkit-transform:translateX(0);-moz-transform:translateX(0);-o-transform:translateX(0);-ms-transform:translateX(0);transform:translateX(0);opacity:1;-ms-filter:none;filter:none;-webkit-transition:opacity .5s linear,-webkit-transform .7s cubic-bezier(.56,.48,0,.99);-moz-transition:opacity .5s linear,-moz-transform .7s cubic-bezier(.56,.48,0,.99);-o-transition:opacity .5s linear,-o-transform .7s cubic-bezier(.56,.48,0,.99);-ms-transition:opacity .5s linear,-ms-transform .7s cubic-bezier(.56,.48,0,.99);transition:opacity .5s linear,transform .7s cubic-bezier(.56,.48,0,.99);}.themeControll.active{display:block;-webkit-transform:translateX(-170px);-moz-transform:translateX(-170px);-o-transform:translateX(-170px);-ms-transform:translateX(-170px);transform:translateX(-170px);-webkit-transition:opacity .5s linear,-webkit-transform .7s cubic-bezier(.56,.48,0,.99);-moz-transition:opacity .5s linear,-moz-transform .7s cubic-bezier(.56,.48,0,.99);-o-transition:opacity .5s linear,-o-transform .7s cubic-bezier(.56,.48,0,.99);-ms-transition:opacity .5s linear,-ms-transform .7s cubic-bezier(.56,.48,0,.99);transition:opacity .5s linear,transform .7s cubic-bezier(.56,.48,0,.99);}.themeControll a{border-bottom:1px solid rgba(255,255,255,0.1);border-radius:0;clear:both;color:#fff;display:block;height:auto;line-height:16px;margin-bottom:5px;padding-bottom:8px;text-transform:capitalize;width:auto;font-family:Roboto Condensed,Helvetica Neue,Helvetica,sans-serif;}.tbtn{background:#2D3E50;color:#FFFFFF!important;font-size:30px;height:auto;padding:10px;position:absolute;right:-40px;top:0;width:40px;cursor:pointer;}.linkinner{display:block;height:400px;}.linkScroll .scroller-bar{width:17px;}.linkScroll .scroller-bar,.linkScroll .scroller-track{background:#1d2e40!important;border-color:#1d2e40!important;}@media (max-width: 780px) {.themeControll{display:none;}}
</style>
</head>
<body>
 
<div id="wrapper">
<div class="header">
<nav class="navbar   navbar-site navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
<a href="index.php" class="navbar-brand logo logo-title">
<span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
FT<span> REPOSITORY</span> </a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="login.html">Login</a></li>
</ul>
</div>
 
</div>
 
</nav>
</div>
 
<div class="intro" style="background-image: url(images/bg3.jpg);">
<div class="dtable hw100">
<div class="dtable-cell hw100">
<div class="container text-center">
<h1 class="intro-title animated fadeInDown"> REPOSITORY</h1>
<p class="sub animateme fittext3 animated fadeIn">Fakultas Teknik Universitas Negeri Gorontalo</p>
<div class="row search-row animated fadeInUp">
<form method="GET" action="search/" >
<div class="col-lg-8 col-sm-8 search-col relative"><i class="icon-docs icon-append"></i>
<input type="search" name="keyword" style="font-size:14px;" class="form-control has-icon" placeholder="Kata kunci pencarian" required>
</div>
<div class="col-lg-4 col-sm-4 search-col">
<input type="submit" class="btn btn-primary btn-search btn-block" style="padding:10.5px; font-size:19px;" value="Cari">
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<div class="main-container">
<div class="container">
<div class="row">
<div class="col-sm-12 page-content col-thin-right">
<div class="inner-box category-content">

<h3 class="title-2"><i class="icon-search-1"></i> Data Pendukung AIPT</h3>
<div class="row">
<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="prestasi-dosen.html"><i class="icon-book-open ln-shadow"></i>
Prestasi Dosen</a></h3>
<p>Prestasi dosen dibidang pendidikan, penelitian dan pengabdian pada masyarakat</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="prestasi-mahasiswa.html"><i class="icon-book-open ln-shadow"></i>
Prestasi Mahasiswa</a></h3>
<p>Prestasi mahasiswa dibidang penelitian, karya ilmiah, olahraga dan seni</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="karya-ilmiah.html"><i class="icon-book-open ln-shadow"></i>
Karya Ilmiah Dosen</a></h3>
<p>Karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap
yang bidang keahliannya sesuai dengan program studi</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="haki-paten.html"><i class="icon-book-open ln-shadow"></i>
HKI</a></h3>
<p>Karya dosen program studi yang telah memperoleh Hak atas Kekayaan Intelektual (HKI) atau karya yang mendapat pengakuan/penghargaan dari lembaga nasional/internasional</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="penelitian.html"><i class="icon-book-open ln-shadow"></i>
Penelitian</a></h3>
<p>Judul penelitian yang sesuai dengan bidang keilmuan program studi, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan program studi</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="pengabdian.html"><i class="icon-book-open ln-shadow"></i>
Pengabdian</a></h3>
<p>Judul pengabdian yang sesuai dengan bidang keilmuan program studi, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan program studi</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="kerja-sama.html"><i class="icon-book-open ln-shadow"></i>
Kerja Sama</a></h3>
<p>Instansi dalam dan luar negeri yang menjalin kerjasama yang terkait dengan program studi/jurusan</p>
</div>
</div>

</div>

</div>

<div class="inner-box relative">
<div class="row">
<div class="col-md-12">
<h3 class="title-2"><i class="icon-search-1"></i> File Dokumen Utama</h3>
<div class="row">

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="akreditasi-prodi.html"><i class="icon-book-open ln-shadow"></i>
Akreditasi Prodi</a></h3>
<p>Sertifikat Akreditasi Program Studi</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="kurikulum.html"><i class="icon-book-open ln-shadow"></i>
Kurikulum</a></h3>
<p>Kurikulum Program Studi FT UNG</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="pedoman-akademik.html"><i class="icon-book-open ln-shadow"></i>
PEDOMAN AKADEMIK</a></h3>
<p>Pedoman Akademik Fakultas Teknik Universitas Negeri Gorontalo<p>
</div>
</div>
  
<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="rencana-strategis.html"><i class="icon-book-open ln-shadow"></i>
RENCANA STRATEGIS</a></h3>
<p>Rencana Strategis (Renstra) Fakultas Teknik Universitas Negeri Gorontalo<p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="rencana-operasional.html"><i class="icon-book-open ln-shadow"></i>
RENCANA OPERASIONAL</a></h3>
<p>Rencana Operasional (Renop) Fakultas Teknik Universitas Negeri Gorontalo</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="standar-operasional-prosedur.html"><i class="icon-book-open ln-shadow"></i>
SOP</a></h3>
<p>Uraian Tugas dan Wewenang, Prosedur Operasi Standar dan Petunjuk Teknis</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="envisioning.html"><i class="icon-book-open ln-shadow"></i>
Envisioning</a></h3>
<p>Envisioning Program Studi Fakultas Teknik Universitas Negeri Gorontalo</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="tracer-study.html"><i class="icon-book-open ln-shadow"></i>
Tracer Study</a></h3>
<p>Penelitian mengenai situasi alumni khususnya dalam hal pencarian kerja, situasi kerja, dan pemanfaatan pemerolehan kompetensi selama kuliah</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="pengembangan-sdm.html"><i class="icon-book-open ln-shadow"></i>
Pengembangan SDM</a></h3>
<p>Membentuk manusia yang berkualitas dengan keterampilan, kemampuan kerja dan loyalitas kepada suatu perusahaan ataupun organisasi</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="haki.html"><i class="icon-book-open ln-shadow"></i>
HKI</a></h3>
<p>Karya dosen program studi yang telah memperoleh Hak atas Kekayaan Intelektual (Paten/HAKI) atau karya yang mendapat pengakuan/penghargaan dari lembaga nasional/internasional</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="evaluasi-mutu-internal.html"><i class="icon-book-open ln-shadow"></i>
EMI</a></h3>
<p>Evaluasi Mutu Internal Fakultas Teknik Universitas Negeri Gorontalo</p>
</div>
</div>

<div class="col-md-4 col-sm-4 ">
<div class="cat-list">
<h3 class="cat-title"><a href="surat-keputusan.html"><i class="icon-book-open ln-shadow"></i>
SK (Surat Keputusan)</a></h3>
<p>Surat atau ketetapan yang dibuat oleh badan atau perusahaan tertentu dalam bentuk tertulis dengan berdasarkan dari peraturan perundang undangan yang mengatur</p>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="footer" id="footer">
<div class="container">
<ul class=" pull-right navbar-link footer-nav">
<li> &copy; 2017 Fakultas Teknik Universitas Negeri Gorontalo</li>
</ul>
</div>
</div>
 
</div>
 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.matchHeight-min.js"></script>
<script src="assets/js/hideMaxListItem.js"></script>
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<script src="assets/js/script.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/usastates.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/autocomplete-demo.js"></script>
</body>
</html>