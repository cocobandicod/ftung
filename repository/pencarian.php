<?php
require_once('config/koneksi.php');
if($_GET['keyword']){
  $link = '../';	
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
<script src="<?= $link; ?>assets/js/pace.min.js"></script>
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
<a href="<?= $link; ?>index.php" class="navbar-brand logo logo-title">
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
<h1 class="intro-title animated fadeInDown"> REPOSITORY</h1>
<p class="sub animateme fittext3 animated fadeIn">Fakultas Teknik Universitas Negeri Gorontalo</p>
<div class="row search-row animated fadeInUp">
<form method="GET" action="<?= $link; ?>search/" >
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

	<h3 class="title-2"><i class="icon-search-1"></i> Pencarian</h3>
    <div class="alert alert-success">
    <h4 style="padding:0px; margin:0px;">Hasil pencarian kata gdfgdf : <?= $_GET[keyword]; ?></h4>
    </div>
    <hr>
	<?php
						
        if ($_GET['keyword'] != ''){
		
		$lcSearchVal = str_replace("+"," ",$_GET['keyword']); // Kata dari kolom pencarian
        $lcSearchVal = explode( ' ', $lcSearchVal );
        
            $sql = 'SELECT * FROM berkas b, menu m WHERE b.id_menu = m.id_menu AND ( '; // QUERY LEVEL ADMIN
        
            $parts = array();
            $kata  = array();
            foreach( $lcSearchVal as $lcSearchWord ){
                $parts[] = 'b.judul LIKE "%'.$lcSearchWord.'%"';
				$parts[] = 'b.isi LIKE "%'.$lcSearchWord.'%"';
                $kata[]  = $lcSearchWord;
            }	
            
        $dapat .= implode(' ', $kata);
        
        $sql .= implode(' OR ', $parts).') ORDER BY id_berkas ASC';
        
        $query = mysqli_query($con,$sql);
		}
		while($s = mysqli_fetch_array($query)){
    ?>
   <h4 style="padding:0px; margin:0px;"><?php $kecil = strtolower($s[judul]); echo ucfirst($kecil) ?></h4>
   <p style="padding:0px;">Kategori : <?= $s[menu]; ?> | <?= $s[isi]; ?></p>
   <?php if($s[file_pendukung] == NULL){ } else { ?>
   <a href="<?= $link; ?>berkas/<?= $s[file_pendukung];?>" class="btn btn-primary" target="_blank">Download</a>
   <?php } ?>
   <hr>
   <?php } ?>
   
<br>
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