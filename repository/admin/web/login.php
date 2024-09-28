<?php
require_once('../config/koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badan Peningkatan Dan Percepatan Akreditasi Universitas Negeri Gorontalo</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
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
								 
								echo "<script>document.location='admin.html'</script>";
							}
							else {
								echo "<script>document.location='login-error.html'</script>";
							}
							exit;							
																				
						}			
			?>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <!--<h1 class="logo-name">SI-IU</h1>-->
                <img src="img/logo.png" width="120">
            </div>
            <h3>Sistem  Administrasi Akreditasi Perguruan Tinggi</h3>
            <p>Badan Peningkatan Dan Percepatan Akreditasi<br>Universitas Negeri Gorontalo</p>
            <p>Login Aplikasi</p>
            <?php if($_GET[act] == 'error'){ ?>
            <small style="color:#F00">Login Gagal Periksa Kembali Username dan Password</small>
            <?php } else { } ?>
            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary block full-width m-b">Login</button>
                <a href="#"><small>Forgot password?</small></a>
                
            </form>
            <p class="m-t"><small>&copy; 2017 Universitas Negeri Gorontalo</small></p>
            
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
