<?php
function del_pengelola($con,$kode){
	$kode = base64_decode($kode);
	mysqli_query($con,"DELETE FROM users WHERE id = '$kode'");	
	echo "<script>
    window.location=('pengelola.html');</script>";
}
function input_pengelola($con,$kode){
	$kode = base64_decode($kode);
	$e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users WHERE id = '$kode'"));
?>
<div class="col-lg-12">
                    <?php
					if($_REQUEST[save]){
									$pass = $_POST['password'];
									
									$pengacak  = "NDJS3289JSKS190JISJI";
									$password = md5($pengacak . md5($pass) . $pengacak);
									
									mysqli_query ($con,"INSERT INTO users VALUES ('$id',
																			'$_POST[username]',
																			'$password',
																			'$_POST[nama_lengkap]',
																			'$_POST[email]',
																			'$_POST[no_telp]',
																			'$_POST[level]')"); 					   

                                    echo "<script>
                                    window.location=('pengelola.html');</script>";
					}
					if($_REQUEST[update]){
						
							$pass = $_POST['password'];
							
							$pengacak  = "NDJS3289JSKS190JISJI";
							$password = md5($pengacak . md5($pass) . $pengacak);
							
							if ($pass == ''){ // JIKA TIDAK MENGANNTI PASSWORD
							
								$query = mysqli_query ($con,"update users set username 	 	= '$_POST[username]',
																		nama_lengkap	= '$_POST[nama_lengkap]',
																		email			= '$_POST[email]',
																		no_telp			= '$_POST[no_telp]',
																		level			= '$_POST[level]'
																		WHERE id		= '$kode'");
									 
							} else {
							
								$query = mysqli_query ($con,"update users set username 	 	= '$_POST[username]',
																		password 		= '$password',
																		nama_lengkap	= '$_POST[nama_lengkap]',
																		email			= '$_POST[email]',
																		no_telp			= '$_POST[no_telp]',
																		level			= '$_POST[level]'
																		WHERE id		= '$kode'");		
								
							} 					   

                                    echo "<script>
                                    window.location=('pengelola.html');</script>";
					}
					?>
                    <form method="post" action="">
                    <table width="100%" class="table">
                    <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo input('nama_lengkap',$e[nama_lengkap]); ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo input('email',$e[email]); ?></td>
                    </tr>
                    <tr>
                      <td>No. Telepon</td>
                      <td><?php echo input('no_telp',$e[no_telp]); ?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><?php echo input('username',$e[username]); ?></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td><?php echo input_pass('password',$e[password]); ?></td>
                    </tr>
                    <tr>
                      <td>Level Pengelola</td>
                      <td><?php echo level($e[level]); ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="pengelola.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="pengelola.html">Kembali</a>
                      <?php } ?>
                      </td>
                    </tr>
                    </table>
                    </form>
</div>
<?php }
function del_fakultas($con,$kode){
	$kode = base64_decode($kode);
	mysqli_query($con,"DELETE FROM fakultas WHERE id_fakultas = '$kode'");	
	echo "<script>
    window.location=('fakultas.html');</script>";
}
function input_fakultas($con,$kode){
	$kode = base64_decode($kode);
	$e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM fakultas WHERE id_fakultas = '$kode'"));
?>
<div class="col-lg-12">
                    <?php
					if($_REQUEST[save]){
                                    $import="INSERT INTO fakultas VALUES('$id',
                                                                         '$_POST[kode_fakultas]',
                                                                         '$_POST[nama_fakultas]')";
                                    mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					   

                                    echo "<script>
                                    window.location=('fakultas.html');</script>";
					}
					if($_REQUEST[update]){
						
						mysqli_query ($con,"UPDATE fakultas SET kode_fakultas 	= '$_POST[kode_fakultas]',
														  nama_fakultas 	= '$_POST[nama_fakultas]'
														  WHERE id_fakultas	= '$kode'"); 					   

                                    echo "<script>
                                    window.location=('fakultas.html');</script>";
					}
					?>
                    <form method="post" action="">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>Kode Fakultas</td>
                    <td><?php echo input('kode_fakultas',$e[kode_fakultas]); ?></td>
                    </tr>
                    <tr>
                      <td>Nama Fakultas</td>
                      <td><?php echo input('nama_fakultas',$e[nama_fakultas]); ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="fakultas.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="fakultas.html">Kembali</a>
                      <?php } ?>
                      </td>
                    </tr>
                    </table>
                    </form>
</div>
<?php }
function del_jurusan($con,$kode){
	$kode = base64_decode($kode);
	mysqli_query($con,"DELETE FROM jurusan WHERE id_jurusan = '$kode'");	
	echo "<script>
    window.location=('jurusan.html');</script>";
}
function input_jurusan($con,$kode){
	$kode = base64_decode($kode);
	$e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jurusan WHERE id_jurusan = '$kode'"));
?>
<div class="col-lg-12">
                    <?php
					if($_REQUEST[save]){
                                        $import="INSERT INTO jurusan VALUES('$id',
                                                                            '$_POST[id_fakultas]',
																			'$_POST[kode_jurusan]',
                                                                            '$_POST[nama_jurusan]')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					   

                                    echo "<script>
                                    window.location=('jurusan.html');</script>";
					}
					if($_REQUEST[update]){
						
						mysqli_query ($con,"UPDATE jurusan SET id_fakultas 	= '$_POST[id_fakultas]',
														  kode_jurusan 	= '$_POST[kode_jurusan]',
														  nama_jurusan 	= '$_POST[nama_jurusan]'
														  WHERE id_jurusan	= '$kode'"); 					   

                                    echo "<script>
                                    window.location=('jurusan.html');</script>";
					}
					?>
                    <form method="post" action="">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>Fakultas</td>
                    <td><?php echo fakultas('id_fakultas',$e[id_fakultas]); ?></td>
                    </tr>
                    <tr>
                      <td>Kode Jurusan</td>
                      <td><?php echo input('kode_jurusan',$e[kode_jurusan]); ?></td>
                    </tr>
                    <tr>
                      <td>Nama Jurusan</td>
                      <td><?php echo input('nama_jurusan',$e[nama_jurusan]); ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="jurusan.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="jurusan.html">Kembali</a>
                      <?php } ?>
                      </td>
                    </tr>
                    </table>
                    </form>
</div>
<?php } 
function del_prodi($con,$kode){
	$kode = base64_decode($kode);
	mysqli_query($con,"DELETE FROM prodi WHERE id_prodi = '$kode'");	
	echo "<script>
    window.location=('prodi.html');</script>";
}
function input_prodi($con,$kode){
	$kode = base64_decode($kode);
	$e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$kode'"));
	$j = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jurusan WHERE id_jurusan = '$e[id_jurusan]'"));	
?>
<div class="col-lg-12">
                    <?php
					if($_REQUEST[save]){
                                        $import="INSERT INTO prodi VALUES('$id',
                                                                               '$_POST[id_jurusan]',
																			   '$_POST[kode_prodi]',
																			   '$_POST[strata]',
                                                                               '$_POST[nama_prodi]')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					   

                                    echo "<script>
                                    window.location=('prodi.html');</script>";
					}
					if($_REQUEST[update]){
						
						mysqli_query ($con,"UPDATE prodi SET id_jurusan 		 = '$_POST[id_jurusan]',
														  kode_prodi 	 = '$_POST[kode_prodi]',
														  strata 		 = '$_POST[strata]',
														  nama_prodi 	 = '$_POST[nama_prodi]'
														  WHERE id_prodi = '$kode'"); 					   

                                    echo "<script>
                                    window.location=('prodi.html');</script>";
					}
					?>
                    <form method="post" action="">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>Fakultas</td>
                    <td>
                    <select name="id_fakultas" id="fakultas" class='form-control' required>
                    <option value="">Fakultas --</option>
                    <?php
                    //mengambil nama-nama propinsi yang ada di database
                    $propinsi = mysqli_query($con,"SELECT * FROM fakultas ORDER BY id_fakultas");
                    while($f=mysqli_fetch_array($propinsi)){
                        if($j[id_fakultas] != ''){
                            if($j[id_fakultas] == $f[id_fakultas]){
                            echo "<option value='$f[id_fakultas]' selected='selected'>$f[nama_fakultas]</option>";
                            } else {
                            echo "<option value='$f[id_fakultas]'>$f[nama_fakultas]</option>";
                            }
                        } else {
                            echo "<option value='$f[id_fakultas]'>$f[nama_fakultas]</option>";
                        }
                    }
                    ?>
                    </select>
                    </td>
                    </tr>
                    <tr>
                      <td> Jurusan</td>
                      <td>
                    <select name="id_jurusan" id="jurusan" class='form-control' required>
                    <option value="">Jurusan --</option>
                    <?php
                    if($e[id_jurusan] != NULL){
						$kota = mysqli_query($con,"SELECT * FROM jurusan WHERE id_fakultas = '$j[id_fakultas]' ORDER BY id_jurusan ");
						while($p=mysqli_fetch_array($kota)){
							if($p[id_jurusan] == $e[id_jurusan]){
								echo "<option value='$p[id_jurusan]' selected='selected'>$p[nama_jurusan]</option>";	
							} else {
								echo "<option value='$p[id_jurusan]' >$p[nama_jurusan]</option>";	
							}
						}
					}
                    ?>
                    <?php
                    //mengambil nama-nama propinsi yang ada di database
                    $kota = mysqli_query($con,"SELECT * FROM jurusan WHERE id_fakultas = '$e[id_fakultas]' ORDER BY id_jurusan ");
                    while($p=mysqli_fetch_array($kota)){
                            echo "<option value='$p[id_jurusan]' >$p[nama_jurusan]</option>";
                    }
                    ?>
                    </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Kode Prodi</td>
                      <td><?php echo input('kode_prodi',$e[kode_prodi]); ?></td>
                    </tr>
                    <tr>
                      <td>Strata</td>
                      <td><?php echo strata('strata',$e[strata]); ?></td>
                    </tr>
                    <tr>
                      <td>Nama Program Studi</td>
                      <td><?php echo input('nama_prodi',$e[nama_prodi]); ?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="prodi.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="prodi.html">Kembali</a>
                      <?php } ?>
                      </td>
                    </tr>
                    </table>
                    </form>
</div>
<?php }
function del_surat_masuk($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_masuk WHERE kode = '$kode'"));
	unlink("../berkas/$d[file]");
	mysqli_query($con,"DELETE FROM surat_masuk WHERE kode = '$kode'");	
	echo "<script>
    window.location=('surat-masuk.html');</script>";
}
function input_surat_masuk($con,$kode){
	$e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_masuk WHERE kode = '$kode'"));
?>
<div class="col-lg-6">
<?php
					if (isset($_REQUEST['save'])) {
	
					   define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE
					    
						$size			= $_FILES['fupload']['size'];
						$nama_file	  	= $_FILES['fupload']['name'];
						$fileType 		= $_FILES['fupload']['type'];
					
						// verifikasi file (jpg) exif_read_data exif_imagetype
						$allowed = array('image/jpeg','application/force-download','application/pdf');
					  
					  if (!in_array($fileType, $allowed)) {
						//echo "hanya diijinkan untuk meng-upload file gambar (doc,docx)";	
									echo "<script>
										alert('Gagal upload, file harus bertipe .jpg .pdf');
										</script>";
					  } 
					  else {
						$myFile = $_FILES['fupload'];
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = 'Surat_Masuk_'.$_POST[tanggal_surat]."_".$myFile['name'];
						$name = preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;         
					
							move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);
							
							$kode = rand(10000,100000);
							$enkript = base64_encode($con,$kode);
							
							$tgl_surat = ubah_tgl_input($_POST[tanggal_surat]);
							
							$query = "INSERT INTO surat_masuk VALUES ('$id',
							'$enkript',
							'$_POST[no_surat]',
							'tanggal_surat',
							'$_POST[nama_surat]',
							'$_POST[asal_surat]',
							'$name')";
							mysqli_query($con,$query);
					
							echo "<script>
								window.location=('surat-masuk.html');</script>";
							
					  }
					
					}
					if (isset($_REQUEST['update'])) {
	
					   define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE
					
						$size			= $_FILES['fupload']['size'];
						$nama_file	  	= $_FILES['fupload']['name'];
						$fileType 		= $_FILES['fupload']['type'];
					
						// verifikasi file (jpg) exif_read_data exif_imagetype
						$allowed = array('image/jpeg','application/force-download','application/pdf');
						
					if($_POST[file] != NULL){
						
							$tgl_surat = ubah_tgl_input($_POST[tanggal_surat]);
							
						    mysqli_query ($con,"UPDATE surat_masuk SET no_surat 	= '$_POST[no_surat]',
														  	     tanggal_surat 	= '$tgl_surat',
																 nama_surat 	= '$_POST[nama_surat]',
																 asal_surat 	= '$_POST[asal_surat]'
																 WHERE kode = '$kode'");
					
							echo "<script>
								window.location=('surat-masuk.html');</script>";						
					} else {
					  if (!in_array($fileType, $allowed)) {
						//echo "hanya diijinkan untuk meng-upload file gambar (doc,docx)";	
									echo "<script>
										alert('Gagal upload, file harus bertipe .jpg .pdf $fileType');
										</script>";
					  } 
					  else {
						$myFile = $_FILES['fupload'];
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = 'Surat_Masuk_'.$_POST[tanggal_surat]."_".$myFile['name'];
						$name = preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;         
					
							move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);
							
							$tgl_surat = ubah_tgl_input($_POST[tanggal_surat]);
							
						    mysqli_query ($con,"UPDATE surat_masuk SET no_surat 	= '$_POST[no_surat]',
														  	     tanggal_surat 	= '$tgl_surat',
																 nama_surat 	= '$_POST[nama_surat]',
																 asal_surat 	= '$_POST[asal_surat]',
																 file 	 		= '$name'
																 WHERE kode = '$kode'");
					
							echo "<script>
								window.location=('surat-masuk.html');</script>";
							
					  }
					}
					}
					if($_GET[act] == 'del_surat'){
						$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_masuk WHERE kode = '$kode'"));
						unlink("../berkas/$d[file]");
					    mysqli_query ($con,"UPDATE surat_masuk SET file = '' WHERE kode = '$kode'");

						echo "<script>
						window.location=('surat-masuk-edit-$kode.html');</script>";
					}
?>
                    <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>No. Surat</td>
                    <td><?php echo input('no_surat',$e[no_surat]); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Surat</td>
                      <td>
                      <div class="form-group" id="data_1">
                       <div class="input-group date">
                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       <?php if($e[tanggal_surat] == NULL){ ?>
                       <input type="text" name="tanggal_surat" class="form-control" value="<?php echo date('m/d/Y'); ?>">
                       <?php } else { 
					   $tgl_surat = ubah_tgl_edit($e[tanggal_surat]);
					   ?>
                       <input type="text" name="tanggal_surat" class="form-control" value="<?php echo $tgl_surat; ?>">
                       <?php } ?>
                       </div>
                    </div>
                    </tr>
                    <tr>
                      <td> Nama Surat</td>
                      <td><?php echo input('nama_surat',$e[nama_surat]); ?></td>
                    </tr>
                    <tr>
                      <td>Asal Surat</td>
                      <td><?php echo input('asal_surat',$e[asal_surat]); ?></td>
                    </tr>
                    <tr>
                      <td>File Surat</td>
                      <td>
							   <?php
                               if($e[file] != NULL){ 
							   echo "<a href='berkas/$e[file]' class='label label-info '>Download</a>";
							   echo '<input type="hidden" name="file" value="$e[file]" />';
							   ?>
                                <a href="delete-file-surat-masuk-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File Surat ?')" 
                    			class="label label-primary" style="float:right;">Hapus File</a>
							   <?php } else { ?>
							   <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                               <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							   <div class="form-control" data-trigger="fileinput">
							   <i class="glyphicon glyphicon-file fileinput-exists"></i>
							   <span class="fileinput-filename"></span>
							   </div>
							   <span class="input-group-addon btn btn-default btn-file">
							   <span class="fileinput-new">Select file</span>
							   <span class="fileinput-exists">Change</span>
							   <input type="file" id="file" name="fupload" required>
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               *Format file : .pdf .jpg
                               </form>  
                               <?php } ?>            
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="surat-masuk.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="surat-masuk.html">Kembali</a>
                      <?php } ?>
                      </td>
                    </tr>
                    </table>
                    </form>
</div>
<?php }
function del_akreditasi_pt($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_universitas WHERE kode = '$kode'"));
	unlink("../berkas/$d[file_sk]");
	unlink("../berkas/$d[file_sertifikat]");
	mysqli_query($con,"DELETE FROM akreditasi_universitas WHERE kode = '$kode'");	
	echo "<script>
    window.location=('akreditasi-pt.html');</script>";
}
function input_akreditasi_pt($con,$kode){
	require_once('../config/fungsi_upload_berkas.php');
	$s = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_universitas WHERE kode = '$kode'"));
?>
                    <?php
					if($_REQUEST[save]){
                                        $kode = rand(10000,100000);
										$enkript = base64_encode($con,$kode);
										$import="INSERT INTO akreditasi_universitas VALUES('$id_universitas',
                                                                               			   '$enkript',
																						   '$_POST[nomor]',
																						   '$_POST[tahun]',
																						   '$_POST[no_sk]',
																						   '$_POST[tahun_sk]',
																						   '$_POST[peringkat]',
																						   '$_POST[tahun_kadaluarsa]',
																						   '$_POST[nilai]',
																						   '$_POST[file_sk]',
																						   '$_POST[file_sertifikat]')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					  
                                    
									echo "<script>
                                    window.location=('akreditasi-pt-edit-$enkript.html');</script>";
					}
					if($_REQUEST[update]){

						mysqli_query ($con,"UPDATE akreditasi_universitas SET nomor 	 		= '$_POST[nomor]',
														  			    tahun 	 		= '$_POST[tahun]',
																		no_sk 		 	= '$_POST[no_sk]',
																		peringkat 	 	= '$_POST[peringkat]',
																		tahun_kadaluarsa = '$_POST[tahun_kadaluarsa]',
																		nilai 	 		= '$_POST[nilai]'
																		WHERE kode = '$kode'");		
                                    
									echo "<script>
                                    window.location=('akreditasi-pt-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_sk'){
					    $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_universitas WHERE kode = '$kode'"));
						unlink("../berkas/$d[file_sk]");
					    mysqli_query ($con,"UPDATE akreditasi_universitas SET file_sk 	 = ''
																		WHERE kode = '$kode'");

						echo "<script>
						window.location=('akreditasi-pt-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_sertifikat'){
						$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_universitas WHERE kode = '$kode'"));
						unlink("../berkas/$d[file_sertifikat]");
					    mysqli_query ($con,"UPDATE akreditasi_universitas SET file_sertifikat 	 = ''
																		WHERE kode = '$kode'");

						echo "<script>
						window.location=('akreditasi-pt-edit-$kode.html');</script>";
					}
					?>
                    <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                    <div class="col-lg-6">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>Nomor</td>
                    <td><?php echo input('nomor',$s[nomor]); ?></td>
                    </tr>
                    <tr>
                      <td> Tahun</td>
                      <td><?php echo input('tahun',$s[tahun]); ?></td>
                    </tr>
                    <tr>
                      <td>No. SK</td>
                      <td><?php echo input('no_sk',$s[no_sk]); ?></td>
                    </tr>
                    <tr>
                      <td>Tahun SK</td>
                      <td><?php echo input('tahun_sk',$s[tahun_sk]); ?></td>
                    </tr>
                    <tr>
                      <td>Peringkat</td>
                      <td><?php echo input('peringkat',$s[peringkat]); ?></td>
                    </tr>
                    </table>
                    </div>
                    <div class="col-lg-6">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                      <td>Tahun Kadaluarsa</td>
                      <td><?php echo input('tahun_kadaluarsa',$s[tahun_kadaluarsa]); ?></td>
                    </tr>
                    <tr>
                      <td>Nilai</td>
                      <td><?php echo input('nilai',$s[nilai]); ?></td>
                    </tr>
                    <tr>
                      <td>File SK</td>
                      <td>
                            <?php 
						   if($_GET[id] == 'edit'){
							   if($s[file_sk] != NULL){ 
							   echo "<a href='berkas/$s[file_sk]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-pt-sk-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File SK ?')" 
                    			class="label label-primary" style="float:right;">Hapus File</a>
							   <?php } else { ?>
							   <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                               <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							   <div class="form-control" data-trigger="fileinput">
							   <i class="glyphicon glyphicon-file fileinput-exists"></i>
							   <span class="fileinput-filename"></span>
							   </div>
							   <span class="input-group-addon btn btn-default btn-file">
							   <span class="fileinput-new">Select file</span>
							   <span class="fileinput-exists">Change</span>
							   <input type="file" id="file" name="fupload1" required>
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               <input type="submit" name="upload_1" value="Upload" class="btn btn-primary">
                               *Format file : .pdf
                               </form>
                           <?php } } else { echo "Akan tampil setelah anda menyimpan data"; } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>File Sertifikat</td>
                      <td>
                           <?php 
						   if($_GET[id] == 'edit'){
							   if($s[file_sertifikat] != NULL){ 
							   echo "<a href='berkas/$s[file_sertifikat]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-pt-sertifikat-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File Sertifikat ?')" 
                    			class="label label-primary" style="float:right;">Hapus File</a>
							   <?php } else { ?>
                               <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
							   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							   <div class="form-control" data-trigger="fileinput">
							   <i class="glyphicon glyphicon-file fileinput-exists"></i>
							   <span class="fileinput-filename"></span>
							   </div>
							   <span class="input-group-addon btn btn-default btn-file">
							   <span class="fileinput-new">Select file</span>
							   <span class="fileinput-exists">Change</span>
							   <input type="file" id="file" name="fupload2" required>
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               <input type="submit" name="upload_2" value="Upload" class="btn btn-primary">
                               *Format file : .pdf
                               </form>
                           <?php } } else { echo "Akan tampil setelah anda menyimpan data"; } ?>
                      </td>
                    </tr>
                    </table>
                    </div>
                    <div class="col-lg-12">
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="akreditasi-pt.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="akreditasi-pt.html">Kembali</a>
                      <?php } ?><br /><br />                 
                    </div>
                    </form>
                    <?php
					if (isset($_REQUEST['upload_1'])) {
                       echo upload_sk_pt();
                    } else if (isset($_REQUEST['upload_2'])) {
                       echo upload_sertifikat_pt();
                    }
					?>
<?php }
function del_akreditasi_prodi($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_prodi WHERE kode = '$kode'"));
	unlink("../berkas/$d[file_sk]");
	unlink("../berkas/$d[file_sertifikat]");
	mysqli_query($con,"DELETE FROM akreditasi_prodi WHERE kode = '$kode'");	
	echo "<script>
    window.location=('akreditasi-prodi.html');</script>";
}
function input_akreditasi_prodi($con,$kode){
	require_once('../config/fungsi_upload_berkas.php');
	$s = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_prodi WHERE kode = '$kode'"));	
	$p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));	
?>
                    <?php
					if($_REQUEST[save]){
                                        $kode = rand(10000,100000);
										$enkript = base64_encode($con,$kode);
										$import="INSERT INTO akreditasi_prodi VALUES('$idprodi',
                                                                               			   '$enkript',
																						   '$_POST[nomor]',
																						   '$_POST[tahun]',
																						   '$_POST[prodi]',
																						   '$_POST[no_sk]',
																						   '$_POST[tahun_sk]',
																						   '$_POST[peringkat]',
																						   '$_POST[tahun_kadaluarsa]',
																						   '$_POST[nilai]',
																						   '',
																						   '')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					  
                                    
									echo "<script>
                                    window.location=('akreditasi-prodi-edit-$enkript.html');</script>";
					}
					if($_REQUEST[update]){

						mysqli_query ($con,"UPDATE akreditasi_prodi SET nomor 	 		= '$_POST[nomor]',
														  			    tahun 	 		= '$_POST[tahun]',
																		id_prodi 	 	= '$_POST[prodi]',
																		no_sk 		 	= '$_POST[no_sk]',
																		peringkat 	 	= '$_POST[peringkat]',
																		tahun_kadaluarsa = '$_POST[tahun_kadaluarsa]',
																		nilai 	 		= '$_POST[nilai]'
																		WHERE kode = '$kode'");		
                                    
									echo "<script>
                                    window.location=('akreditasi-prodi-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_sk'){
					    $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_prodi WHERE kode = '$kode'"));
						unlink("../berkas/$d[file_sk]");
					    mysqli_query ($con,"UPDATE akreditasi_prodi SET file_sk = '' WHERE kode = '$kode'");

						echo "<script>
						window.location=('akreditasi-prodi-edit-$_GET[kode].html');</script>";
					}
					if($_GET[act] == 'del_sertifikat'){
						$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM akreditasi_prodi WHERE kode = '$kode'"));
						unlink("../berkas/$d[file_sertifikat]");
					    mysqli_query ($con,"UPDATE akreditasi_prodi SET file_sertifikat = '' WHERE kode = '$kode'");

						echo "<script>
						window.location=('akreditasi-prodi-edit-$_GET[kode].html');</script>";
					}
					?>
<form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
<div class="col-lg-6">                  
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>Nomor</td>
                    <td><?= input('nomor',$s[nomor]); ?></td>
                    </tr>
                    <tr>
                      <td> Tahun</td>
                      <td><?= input('tahun',$s[tahun]); ?></td>
                    </tr>
                    <tr>
                      <td>Program Studi</td>
                      <td>
                      <?php 
					  if($_SESSION['level'] == 'Administrator'){
					  	echo prodi($s[id_prodi]);
					  } else {
					    echo prodi2($s[id_prodi]); 
					  }
					  ?>
                      </td>
                    </tr>
                    <tr>
                      <td>No. SK</td>
                      <td><?= input('no_sk',$s[no_sk]); ?></td>
                    </tr>                   
                    <tr>
                      <td>Tahun SK</td>
                      <td><?= input('tahun_sk',$s[tahun_sk]); ?></td>
                    </tr>
                    </table>
</div>
<div class="col-lg-6">                    
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                      <td>Peringkat</td>
                      <td><?= input('peringkat',$s[peringkat]); ?></td>
                    </tr>
                    <tr>
                      <td>Tahun Kadaluarsa</td>
                      <td><?= input('tahun_kadaluarsa',$s[tahun_kadaluarsa]); ?></td>
                    </tr>
                    <tr>
                      <td>Nilai</td>
                      <td><?= input('nilai',$s[nilai]); ?></td>
                    </tr>
                    <tr>
                      <td>File SK</td>
                      <td>
                           <?php 
						       if($_GET[id] == 'edit'){
							   if($s[file_sk] != NULL){ 
							   echo "<a href='berkas/$s[file_sk]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-prodi-sk-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File SK ?')" 
                    			class="label label-primary" style="float:right;">Hapus File</a>
							   <?php } else { ?>
							   <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                               <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							   <div class="form-control" data-trigger="fileinput">
							   <i class="glyphicon glyphicon-file fileinput-exists"></i>
							   <span class="fileinput-filename"></span>
							   </div>
							   <span class="input-group-addon btn btn-default btn-file">
							   <span class="fileinput-new">Select file</span>
							   <span class="fileinput-exists">Change</span>
							   <input type="file" id="file" name="fupload1" required>
                               <input type="hidden" name="nama_prodi" value="<?= $p[strata].'-'.$p[nama_prodi]; ?>" />
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               <input type="submit" name="upload_1" value="Upload" class="btn btn-primary">
                               *Format file : .pdf
                               </form>
                           <?php } } else { echo "Akan tampil setelah anda menyimpan data"; } ?>                      
                      </td>
                    </tr>
                    <tr>
                      <td>File Sertifikat</td>
                      <td>
                           <?php 
						   if($_GET[id] == 'edit'){
							   if($s[file_sertifikat] != NULL){ 
							   echo "<a href='berkas/$s[file_sertifikat]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-prodi-sertifikat-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File Sertifikat ?')" 
                    			class="label label-primary" style="float:right;">Hapus File</a>
							   <?php } else { ?>
                               <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
							   <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							   <div class="form-control" data-trigger="fileinput">
							   <i class="glyphicon glyphicon-file fileinput-exists"></i>
							   <span class="fileinput-filename"></span>
							   </div>
							   <span class="input-group-addon btn btn-default btn-file">
							   <span class="fileinput-new">Select file</span>
							   <span class="fileinput-exists">Change</span>
							   <input type="file" id="file" name="fupload2" required>
                               <input type="hidden" name="nama_prodi" value="<?= $p[strata].'-'.$p[nama_prodi]; ?>" />
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               <input type="submit" name="upload_2" value="Upload" class="btn btn-primary">
                               *Format file : .pdf
                               </form>
                           <?php } } else { echo "Akan tampil setelah anda menyimpan data"; } ?>       
                      </td>
                    </tr>
                    </table>
                    </div>
                    <div class="col-lg-12">
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="akreditasi-prodi.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="akreditasi-prodi.html">Kembali</a>
                      <?php } ?><br /><br />                 
                    </div>
                    </form>
                    <?php
					if (isset($_REQUEST['upload_1'])) {
                       echo upload_sk_prodi($_POST[nama_prodi]);
                    } else if (isset($_REQUEST['upload_2'])) {
                       echo upload_sertifikat_prodi($_POST[nama_prodi]);
                    }
					?>
<?php }
function del_surat_keluar($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_keluar WHERE kode = '$kode'"));
	unlink("../berkas/$d[file]");
	mysqli_query($con,"DELETE FROM surat_keluar WHERE kode = '$kode'");	
	echo "<script>
    window.location=('surat-keluar.html');</script>";
}
function input_surat_keluar($con,$kode){
	$e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_keluar WHERE kode = '$kode'"));
?>
<div class="col-lg-6">
<?php
					if (isset($_REQUEST['save'])) {
	
					   define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE
					    
						$size			= $_FILES['fupload']['size'];
						$nama_file	  	= $_FILES['fupload']['name'];
						$fileType 		= $_FILES['fupload']['type'];
					
						// verifikasi file (jpg) exif_read_data exif_imagetype
						$allowed = array('image/jpeg','application/force-download','application/pdf');
					  
					  if (!in_array($fileType, $allowed)) {
						//echo "hanya diijinkan untuk meng-upload file gambar (doc,docx)";	
									echo "<script>
										alert('Gagal upload, file harus bertipe .jpg .pdf');
										</script>";
					  } 
					  else {
						$myFile = $_FILES['fupload'];
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = 'Surat_Keluar_'.$_POST[tanggal_surat]."_".$myFile['name'];
						$name = preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;         
					
							move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);
							
							$kode = rand(10000,100000);
							$enkript = base64_encode($con,$kode);
							
							$tgl_surat = ubah_tgl_input($_POST[tanggal_surat]);
							
							$query = "INSERT INTO surat_keluar VALUES ('$id',
							'$enkript',
							'$_POST[no_surat]',
							'$tgl_surat',
							'$_POST[nama_surat]',
							'$_POST[tujuan_surat]',
							'$name')";
							mysqli_query($con,$query);
					
							echo "<script>
								window.location=('surat-keluar.html');</script>";
							
					  }
					
					}
					if (isset($_REQUEST['update'])) {
	
					   define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE
					
						$size			= $_FILES['fupload']['size'];
						$nama_file	  	= $_FILES['fupload']['name'];
						$fileType 		= $_FILES['fupload']['type'];
					
						// verifikasi file (jpg) exif_read_data exif_imagetype
						$allowed = array('image/jpeg','application/force-download','application/pdf');
						
					if($_POST[file] != NULL){
						
							$tgl_surat = ubah_tgl_input($_POST[tanggal_surat]);
							
						    mysqli_query ($con,"UPDATE surat_keluar SET no_surat 	= '$_POST[no_surat]',
														  	     tanggal_surat 	= '$tgl_surat',
																 nama_surat 	= '$_POST[nama_surat]',
																 tujuan_surat 	= '$_POST[tujuan_surat]'
																 WHERE kode = '$kode'");
					
							echo "<script>
								window.location=('surat-keluar.html');</script>";						
					} else {
					  if (!in_array($fileType, $allowed)) {
						//echo "hanya diijinkan untuk meng-upload file gambar (doc,docx)";	
									echo "<script>
										alert('Gagal upload, file harus bertipe .jpg .pdf $fileType');
										</script>";
					  } 
					  else {
						$myFile = $_FILES['fupload'];
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = 'Surat_Keluar_'.$_POST[tanggal_surat]."_".$myFile['name'];
						$name = preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;         
					
							move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);
							
							$tgl_surat = ubah_tgl_input($_POST[tanggal_surat]);
							
						    mysqli_query ($con,"UPDATE surat_keluar SET no_surat 	= '$_POST[no_surat]',
														  	     tanggal_surat 	= '$tgl_surat',
																 nama_surat 	= '$_POST[nama_surat]',
																 tujuan_surat 	= '$_POST[tujuan_surat]',
																 file 	 		= '$name'
																 WHERE kode = '$kode'");
					
							echo "<script>
								window.location=('surat-keluar.html');</script>";
							
					  }
					}
					}
					if($_GET[act] == 'del_surat'){
						$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_keluar WHERE kode = '$kode'"));
						unlink("../berkas/$d[file]");
					    mysqli_query ($con,"UPDATE surat_keluar SET file = '' WHERE kode = '$kode'");

						echo "<script>
						window.location=('surat-keluar-edit-$kode.html');</script>";
					}
?>
                    <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                    <table width="100%" class="table" style="float:left;">
                    <tr>
                    <td>No. Surat</td>
                    <td><?php echo input('no_surat',$e[no_surat]); ?></td>
                    </tr>
                    <tr>
                      <td>Tanggal Surat</td>
                      <td>
                      <div class="form-group" id="data_1">
                       <div class="input-group date">
                       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                       <?php if($e[tanggal_surat] == NULL){ ?>
                       <input type="text" name="tanggal_surat" class="form-control" value="<?php echo date('m/d/Y'); ?>">
                       <?php } else { 
					   $tgl_surat = ubah_tgl_edit($e[tanggal_surat]);
					   ?>
                       <input type="text" name="tanggal_surat" class="form-control" value="<?php echo $tgl_surat; ?>">
                       <?php } ?>
                       </div>
                    </div>
                    </tr>
                    <tr>
                      <td> Nama Surat</td>
                      <td><?php echo input('nama_surat',$e[nama_surat]); ?></td>
                    </tr>
                    <tr>
                      <td>Tujuan Surat</td>
                      <td><?php echo input('tujuan_surat',$e[tujuan_surat]); ?></td>
                    </tr>
                    <tr>
                      <td>File Surat</td>
                      <td>
							   <?php
                               if($e[file] != NULL){ 
							   echo "<a href='berkas/$e[file]' class='label label-info '>Download</a>";
							   echo '<input type="hidden" name="file" value="$e[file]" />';
							   ?>
                                <a href="delete-file-surat-masuk-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File Surat ?')" 
                    			class="label label-primary" style="float:right;">Hapus File</a>
							   <?php } else { ?>
							   <form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
                               <div class="fileinput fileinput-new input-group" data-provides="fileinput">
							   <div class="form-control" data-trigger="fileinput">
							   <i class="glyphicon glyphicon-file fileinput-exists"></i>
							   <span class="fileinput-filename"></span>
							   </div>
							   <span class="input-group-addon btn btn-default btn-file">
							   <span class="fileinput-new">Select file</span>
							   <span class="fileinput-exists">Change</span>
							   <input type="file" id="file" name="fupload" required>
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               *Format file : .pdf .jpg
                               </form>  
                               <?php } ?>            
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
                      <?php if($_GET[id] == 'add'){ ?>
                      <input type="submit" class="btn btn-primary" value="Simpan" name="save" /> |
                      <a href="surat-keluar.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="surat-keluar.html">Kembali</a>
                      <?php } ?>
                      </td>
                    </tr>
                    </table>
                    </form>
</div>
<?php } ?>