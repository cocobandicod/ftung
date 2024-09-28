<?php
function upload_file_pendukung_dosen($prodi,$nama){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('prestasi-dosen-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Prestasi_Dosen_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$nama.'_'.$kode.'_'.$ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE prestasi_dosen SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('prestasi-dosen-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_pendukung_mahasiswa($prodi){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('prestasi-mahasiswa-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Prestasi_Mahasiswa_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$kode.'_'.$ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE prestasi_mahasiswa SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('prestasi-mahasiswa-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_karya_ilmiah($prodi,$nama){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('karya-ilmiah-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Karya_Ilmiah_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$nama.'_'.$kode.'_'.$ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE karya_ilmiah SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");
										  
						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");

						echo "<script>
						window.location=('karya-ilmiah-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_haki($prodi,$nama){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf .jpg');
					  window.location=('haki-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Haki_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$nama.'_'.$kode.'_'.$ubah);
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE haki SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('haki-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_penelitian($prodi,$nama){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('penelitian-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Penelitian_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$kode.'_'.$ubah);
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE penelitian SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('penelitian-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_pengabdian($prodi,$nama){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('pengabdian-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Pengabdian_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$kode.'_'.$ubah);
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE pengabdian SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('penelitian-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_kerja_sama($prodi,$nama){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('kerja-sama-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'Kerja_Sama_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$kode.'_'.$ubah);
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE kerja_sama SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('kerja-sama-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_file_FILE($prodi,$nama,$link,$database){

				  define("UPLOAD_DIR", "../../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download','image/jpeg');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('$link-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						$kode = rand(10000,100000);
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex
						$ubah = $myFile['name'];
						$name = $nama.'_'.preg_replace("/[^A-Z0-9._-]/i","_",$prodi.'_'.$kode.'_'.$ubah);
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE $database SET file_pendukung    = '$name'
																	   WHERE kode = '$_GET[kode]'");

						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '$name',
														ket				= 'file'
														WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('$link-edit-$_GET[kode].html');</script>";
				  
				  }	
}
?>