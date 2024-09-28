<?php
require_once('config/koneksi.php');
require_once('config/fungsi.php');
require_once('prestasi_dosen.php');
require_once('prestasi_mahasiswa.php');
require_once('karya_ilmiah.php');
require_once('haki.php');
require_once('penelitian.php');
require_once('pengabdian.php');
require_once('kerja_sama.php');
if($_GET['get'] == 'prodi'){
  $link = '../../';	
} else {
  $link = '';	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?= $link; ?>assets/ico/favicon.png">
<title>Fakultas Teknik Repository</title>
<link href="<?= $link; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= $link; ?>assets/css/style.css" rel="stylesheet">
<link href="<?= $link; ?>assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?= $link; ?>assets/css/owl.theme.css" rel="stylesheet">
<script>
        paceOptions = {
            elements: true
        };
</script>
<script src="<?php echo $link; ?>assets/js/pace.min.js"></script>
<style type="text/css">
option {  
  padding:5px; 
  line-height: 35px; 
}
</style>
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
<a href="<?= $link; ?>index.html" class="navbar-brand logo logo-title">
<span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
FT<span> REPOSITORY</span> </a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="<?= $link; ?>login.html">Login</a></li>
</ul>
</div>
 
</div>
 
</nav>
</div>
 
<div class="intro" style="background-image: url(<?= $link; ?>images/bg3.jpg);">
<div class="dtable hw100">
<div class="dtable-cell hw100">
<div class="container text-center">
<h1 class="intro-title animated fadeInDown"> Repository</h1>
<p class="sub animateme fittext3 animated fadeIn"> Fakultas Teknik Universitas Negeri Gorontalo</p>
<div class="row search-row animated fadeInUp">
<form method="GET" action="<?= $link; ?>search/" >
<div class="col-lg-8 col-sm-8 search-col relative"><i class="icon-docs icon-append"></i>
<input type="text" name="keyword" style="font-size:14px;" class="form-control has-icon" placeholder="Kata kunci pencarian" required>
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
<?php
//echo substr_count("sistem temu kembali ","temu");
?>
<div class="main-container">
<div class="container">
<div class="row">
<div class="col-sm-12 page-content col-thin-right">
<div class="inner-box category-content">
<?php
if($_GET['keyword'] != ''){
	echo pencarian($_GET['keyword']);
} else {

$judul = str_replace("-"," ",$_GET['judul']);
$menu = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE seo = '$_GET[judul]'"));
?>
<h3 class="title-2"><i class="icon-search-1"></i> <?= $menu['menu']; ?></h3>
<p><?= $menu['isi_menu']; ?></p>
<hr>
<?php
if($_GET['judul'] == 'akreditasi-prodi' or 
$_GET['judul'] == 'kurikulum' or 
$_GET['judul'] == 'rencana-strategis' or
$_GET['judul'] == 'rencana-operasional' or 
$_GET['judul'] == 'standar-operasional-prosedur' or 
$_GET['judul'] == 'envisioning' or
$_GET['judul'] == 'tracer-study' or
$_GET['judul'] == 'pengembangan-sdm' or 
$_GET['judul'] == 'haki' or 
$_GET['judul'] == 'evaluasi-mutu-internal' or 
$_GET['judul'] == 'surat-keputusan' or 
$_GET['judul'] == 'pedoman-akademik'){
?>
<div class="row">
    <div class="col-sm-12">
    <select name="" class="form-control" onchange="if (this.value) window.location.href=this.value">
    <?php
    $sql = mysqli_query($con,"SELECT * FROM prodi");
    while($j = mysqli_fetch_array($sql)){
        if($_GET['prodi'] == $j['seo_prodi']){
    ?>
    <option value="<?= $link.$_GET['judul'].'/prodi/'.$j['seo_prodi'].'.html'; ?>" class="option" selected><?= $j['nama_prodi']; ?></option>
    <?php } else { ?>
    <option value="<?= $link.$_GET['judul'].'/prodi/'.$j['seo_prodi'].'.html'; ?>" class="option"><?= $j['nama_prodi']; ?></option>
    <?php } } ?>
    </select><br>
    </div>

	<?php
    if($_GET['judul'] == 'akreditasi-prodi'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM akreditasi_prodi ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM akreditasi_prodi h, prodi p WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'kurikulum'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM kurikulum ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM kurikulum h, prodi p WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'rencana-strategis'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM rencana_strategis ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM rencana_strategis h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'rencana-operasional'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM rencana_operasional ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM rencana_operasional h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'standar-operasional-prosedur'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM sop ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM sop h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'envisioning'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM envisioning ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM envisioning h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>
    
	<?php
    if($_GET['judul'] == 'tracer-study'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM tracer_study ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM tracer_study h, prodi p WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'pengembangan-sdm'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM pengembangan_sdm ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM pengembangan_sdm h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>
    
	<?php
    if($_GET['judul'] == 'haki'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM haki ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['karya']; ?></h3>
                <p><?= $s['pemegang_cipta']; ?> | <?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM haki h, prodi p WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['karya']; ?></h3>
                <p><?= $s['pemegang_cipta']; ?> | <?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'evaluasi-mutu-internal'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM emi ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM emi h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>

	<?php
    if($_GET['judul'] == 'pedoman-akademik'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM pedoman_akademik ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s[file_pendukung];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM pedoman_akademik h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s[file_pendukung];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>
 
 	<?php
    if($_GET['judul'] == 'surat-keputusan'){
		if($_GET['prodi'] == 'fakultas-teknik' or $_GET['get'] != 'prodi'){
	?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM surat_keputusan ORDER BY tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <p><?= $s['ket']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
		<?php
        } else { // TAMPILKAN SEMUA
        ?>
			<?php
            $sql = mysqli_query($con,"SELECT * FROM surat_keputusan h, prodi p 
								WHERE h.id_prodi = p.id_prodi AND p.seo_prodi = '$_GET[prodi]' ORDER BY h.tahun ASC");
            while ($s = mysqli_fetch_array($sql)){        
            ?>
            <div class="col-sm-12 ">
                <div class="col-sm-12 ">
                <h3 style="padding:0px; margin:10px 0px 0px 0px;"><?= $s['judul']; ?></h3>
                <p><?= $s['tahun']; ?></p>
                <a href="<?= $link; ?>berkas/<?= $s['file_pendukung'];?>" class="btn btn-primary" target="_blank">Download</a>
                </div><hr>
            </div>
            <?php } ?>    
    <?php	
	} }
	?>
        
</div>
<hr>
<?php
} }

	if($_GET['judul'] == 'prestasi-dosen'){
		echo prestasi_dosen($con,$link);
	} else if($_GET['judul'] == 'prestasi-mahasiswa'){
		echo prestasi_mahasiswa($con,$link);
	} else if($_GET['judul'] == 'karya-ilmiah'){
		echo karya_ilmiah($con,$link);
	} else if($_GET['judul'] == 'haki-paten'){
		echo haki($con,$link);
	} else if($_GET['judul'] == 'penelitian'){
		echo penelitian($con,$link);
	} else if($_GET['judul'] == 'pengabdian'){
		echo pengabdian($con,$link);
	} else if($_GET['judul'] == 'kerja-sama'){
		echo kerja_sama($con,$link);
	}

?>
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
<script src="<?= $link; ?>assets/js/jquery.min.js"></script>
<script src="<?= $link; ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $link; ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= $link; ?>assets/js/jquery.matchHeight-min.js"></script>
<script src="<?= $link; ?>assets/js/hideMaxListItem.js"></script>
<script src="<?= $link; ?>assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="<?= $link; ?>assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<script src="<?= $link; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?= $link; ?>assets/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="<?= $link; ?>assets/plugins/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?= $link; ?>assets/plugins/autocomplete/usastates.js"></script>
<script type="text/javascript" src="<?= $link; ?>assets/plugins/autocomplete/autocomplete-demo.js"></script>
</body>
</html>
