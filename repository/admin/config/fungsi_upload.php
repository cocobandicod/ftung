<?php
function upload_1(){
				  define("UPLOAD_DIR", "../berkas_pt/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $_POST[jenis_1].'-'.$myFile['name'];
						$name = $_GET[kode].'-'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						
						// periksa ekstensi file
						$parts = pathinfo($name);       
						if (isset($parts['extension'])) {
						  $ext = $parts['extension'];
								 
						  if ($ext !== 'pdf' && $ext !== 'PDF')
							$ext = "pdf";             
							$name = $parts['filename'] . '.' . $ext;
						  } 
						  else { // jika file tidak memiliki ekstensi maka berikan ekstensi .txt
							$ext = 'txt';
							$name = $parts['filename'] . '.txt';
						  }
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name); 
						$date = date('Y-m-d').' '.date("H:i:s");
					    mysqli_query($con,"INSERT INTO ajukan_pt_file VALUES ('$id_file','$_GET[kode]','$_POST[jenis_1]','$name','$nama_file','$date')");
										  
						echo "<script>
						window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_2(){
				  define("UPLOAD_DIR", "../berkas_pt/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload2']['size'];
				  $nama_file	= $_FILES['fupload2']['name'];
				  $fileType 	= $_FILES['fupload2']['type'];
				
				  $allowed = array('application/pdf');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload2'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $_POST[jenis_2].'-'.$myFile['name'];
						$name = $_GET[kode].'-'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						
						// periksa ekstensi file
						$parts = pathinfo($name);       
						if (isset($parts['extension'])) {
						  $ext = $parts['extension'];
								 
						  if ($ext !== 'pdf' && $ext !== 'PDF')
							$ext = "pdf";             
							$name = $parts['filename'] . '.' . $ext;
						  } 
						  else { // jika file tidak memiliki ekstensi maka berikan ekstensi .txt
							$ext = 'txt';
							$name = $parts['filename'] . '.txt';
						  }
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name); 
						$date = date('Y-m-d').' '.date("H:i:s");
					    mysqli_query($con,"INSERT INTO ajukan_pt_file VALUES ('$id_file','$_GET[kode]','$_POST[jenis_2]','$name','$nama_file','$date')");
										  
						echo "<script>
						window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_3(){
				  define("UPLOAD_DIR", "../berkas_pt/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload3']['size'];
				  $nama_file	= $_FILES['fupload3']['name'];
				  $fileType 	= $_FILES['fupload3']['type'];
				
				  $allowed = array('application/pdf');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload3'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $_POST[jenis_3].'-'.$myFile['name'];
						$name = $_GET[kode].'-'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						
						// periksa ekstensi file
						$parts = pathinfo($name);       
						if (isset($parts['extension'])) {
						  $ext = $parts['extension'];
								 
						  if ($ext !== 'pdf' && $ext !== 'PDF')
							$ext = "pdf";             
							$name = $parts['filename'] . '.' . $ext;
						  } 
						  else { // jika file tidak memiliki ekstensi maka berikan ekstensi .txt
							$ext = 'txt';
							$name = $parts['filename'] . '.txt';
						  }
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name); 
						$date = date('Y-m-d').' '.date("H:i:s");
					    mysqli_query($con,"INSERT INTO ajukan_pt_file VALUES ('$id_file','$_GET[kode]','$_POST[jenis_3]','$name','$nama_file','$date')");
										  
						echo "<script>
						window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_4(){
				  define("UPLOAD_DIR", "../berkas_pt/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload4']['size'];
				  $nama_file	= $_FILES['fupload4']['name'];
				  $fileType 	= $_FILES['fupload4']['type'];
				
				  $allowed = array('application/pdf');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload4'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $_POST[jenis_4].'-'.$myFile['name'];
						$name = $_GET[kode].'-'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						
						// periksa ekstensi file
						$parts = pathinfo($name);       
						if (isset($parts['extension'])) {
						  $ext = $parts['extension'];
								 
						  if ($ext !== 'pdf' && $ext !== 'PDF')
							$ext = "pdf";             
							$name = $parts['filename'] . '.' . $ext;
						  } 
						  else { // jika file tidak memiliki ekstensi maka berikan ekstensi .txt
							$ext = 'txt';
							$name = $parts['filename'] . '.txt';
						  }
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name); 
						$date = date('Y-m-d').' '.date("H:i:s"); 
					    mysqli_query($con,"INSERT INTO ajukan_pt_file VALUES ('$id_file','$_GET[kode]','$_POST[jenis_4]','$name','$nama_file','$date')");
										  
						echo "<script>
						window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_5(){
				  define("UPLOAD_DIR", "../berkas_pt/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload5']['size'];
				  $nama_file	= $_FILES['fupload5']['name'];
				  $fileType 	= $_FILES['fupload5']['type'];
				
				  $allowed = array('application/pdf');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .pdf');
					  window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload5'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $_POST[jenis_5].'-'.$myFile['name'];
						$name = $_GET[kode].'-'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						
						// periksa ekstensi file
						$parts = pathinfo($name);       
						if (isset($parts['extension'])) {
						  $ext = $parts['extension'];
								 
						  if ($ext !== 'pdf' && $ext !== 'PDF')
							$ext = "pdf";             
							$name = $parts['filename'] . '.' . $ext;
						  } 
						  else { // jika file tidak memiliki ekstensi maka berikan ekstensi .txt
							$ext = 'txt';
							$name = $parts['filename'] . '.txt';
						  }
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name); 
						$date = date('Y-m-d').' '.date("H:i:s");
					    mysqli_query($con,"INSERT INTO ajukan_pt_file VALUES ('$id_file','$_GET[kode]','$_POST[jenis_5]','$name','$nama_file','$date')");
										  
						echo "<script>
						window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_6(){
				  define("UPLOAD_DIR", "../berkas_pt/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload6']['size'];
				  $nama_file	= $_FILES['fupload6']['name'];
				  $fileType 	= $_FILES['fupload6']['type'];
				
				  $allowed = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File harus bertipe .xls .xlsx');
					  window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload6'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $_POST[jenis_6].'-'.$myFile['name'];
						$name = $_GET[kode].'-'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						
						// periksa ekstensi file
						$parts = pathinfo($name);       
						if (isset($parts['extension'])) {
						  $ext = $parts['extension'];
								 
						  if ($ext !== 'xls' && $ext !== 'xlsx')
							$ext = "xls";             
							$name = $parts['filename'] . '.' . $ext;
						  } 
						  else { // jika file tidak memiliki ekstensi maka berikan ekstensi .txt
							$ext = 'txt';
							$name = $parts['filename'] . '.txt';
						  }
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name); 
						$date = date('Y-m-d').' '.date("H:i:s");
					    mysqli_query($con,"INSERT INTO ajukan_pt_file VALUES ('$id_file','$_GET[kode]','$_POST[jenis_6]','$name','$nama_file','$date')");
										  
						echo "<script>
						window.location=('ajukan-akreditasi-pt-$_GET[kode].html');</script>";
				  
				  }	
}
?>