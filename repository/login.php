<?php

session_start();
require_once('config/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/favicon.png">
<title>Login | Fakultas Teknik Repository</title>
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/owl.theme.css" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script>
        paceOptions = {
            elements: true
        };
    </script>
<script src="assets/js/pace.min.js"></script>
</head>
<body>
<div id="wrapper">
<div class="header">
<nav class="navbar   navbar-site navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
<a href="index.html" class="navbar-brand logo logo-title">
<span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span>
FT<span> REPOSITORY </span> </a></div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
</ul>
</div>
 
</div>
 
</nav>
</div>
 
<div class="main-container">
<div class="container">
<div class="row">
<div class="col-sm-5 login-box">
<div class="panel panel-default">
<div class="panel-intro text-center">
<h2 class="logo-title">
 
<span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> LOGIN<span> ADMINISTRATOR </span>
</h2>
</div>
<div class="panel-body">
<?php
						if (isset($_REQUEST['login'])) {
							
							function anti_injection($data){
								$filter = (htmlspecialchars($data,ENT_QUOTES));
								return $filter;
							}
							
							$user = anti_injection($_POST[user]);
							$pass  = anti_injection($_POST[pass]);
							
							// mencari password terenkripsi berdasarkan username
							$query = "SELECT * FROM users WHERE username = '$user'";
							$hasil = mysqli_query($con,$query) or die("Error");
							$data  = mysqli_fetch_array($hasil);
							 
							$pengacak  = "NDJS3289JSKS190JISJI";

							// cek kesesuaian password terenkripsi dari form login
							// dengan password terenkripsi dari database
							if ((md5($pengacak.md5($pass).$pengacak) == $data['password']))
							{
								session_start();
								// jika sesuai, maka buat session untuk username
								$_SESSION['nama_lengkap']	  = $data['nama_lengkap'];
								$_SESSION['level']	  		  = $data['level'];
								$_SESSION['id_user']	  	  = $data['id'];
								 
								echo "<script>document.location='admin/index.html'</script>";
							}
							else {
								echo "<script>document.location='login.php?pesan=error'</script>";
							}
							exit;							
																				
						}			

?>
<form method="post" action="">
<div class="form-group">
<label for="sender-email" class="control-label">Username:</label>
<div class="input-icon"><i class="icon-user fa"></i>
<input type="text" name="user" placeholder="Username" class="form-control" required>
</div>
</div>
<div class="form-group">
<label for="user-pass" class="control-label">Password:</label>
<div class="input-icon"><i class="icon-lock fa"></i>
<input type="password" class="form-control" name="pass" placeholder="Password" required>
</div>
</div>
<div class="form-group">
<input type="submit" name="login" value="Login" class="btn btn-primary  btn-block">
</div>
</form>
</div>
<?php
if($_GET[pesan] == 'error'){
?>
<div class="panel-footer">
<div class="checkbox pull-left" style="color:#F00">
Login Gagal ! Cek Username & Password Anda
</div>
<div style=" clear:both"></div>
</div>
<?php } else { } ?>
</div>
</div>
</div>
</div>
</div>
 
<div class="footer" id="footer">
<div class="container">
<ul class=" pull-left navbar-link footer-nav">
<ul class=" pull-right navbar-link footer-nav">
<li> &copy; 2017 Fakultas Teknik Universitas Negeri Gorontalo</li>
</ul>
</div>
</div>
 
</div>
 
<script src="ajax/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
 
<script src="assets/js/owl.carousel.min.js"></script>
 
<script src="assets/js/form-validation.js"></script>
 
<script src="assets/js/jquery.matchHeight-min.js"></script>
 
<script src="assets/js/hideMaxListItem.js"></script>
 
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
 
<script src="assets/js/script.js"></script>
</body>
</html>