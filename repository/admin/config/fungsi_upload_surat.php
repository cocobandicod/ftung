<?php
function upload_sk_pt(){

				  define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File SK harus bertipe .pdf');
					  window.location=('akreditasi-pt-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'File_SK_PT_'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE akreditasi_universitas SET file_sk    = '$name'
																		WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('akreditasi-pt-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_sertifikat_pt(){
				  
				  define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload2']['size'];
				  $nama_file	= $_FILES['fupload2']['name'];
				  $fileType 	= $_FILES['fupload2']['type'];
				
				  $allowed = array('application/pdf','application/force-download');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File Sertifikat harus bertipe .pdf');
					  window.location=('akreditasi-pt-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload2'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'File_Sertifikat_PT_'.preg_replace("/[^A-Z0-9._-]/i", "_", $ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);
						
					    mysqli_query ($con,"UPDATE akreditasi_universitas SET file_sertifikat 	 = '$name'
																		WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('akreditasi-pt-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_sk_prodi($prodi){

				  define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload1']['size'];
				  $nama_file	= $_FILES['fupload1']['name'];
				  $fileType 	= $_FILES['fupload1']['type'];
				
				  $allowed = array('application/pdf','application/force-download');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File SK harus bertipe .pdf');
					  window.location=('akreditasi-prodi-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload1'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'File_SK_Prodi_'.preg_replace("/[^A-Z0-9._-]/i", "_", $prodi.$ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);

						mysqli_query ($con,"UPDATE akreditasi_prodi SET file_sk    = '$name'
																		WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('akreditasi-prodi-edit-$_GET[kode].html');</script>";
				  
				  }	
}
function upload_sertifikat_prodi($prodi){
				  
				  define("UPLOAD_DIR", "../berkas/"); // LOKASI FILE	
						   
				  $ukuran		= $_FILES['fupload2']['size'];
				  $nama_file	= $_FILES['fupload2']['name'];
				  $fileType 	= $_FILES['fupload2']['type'];
				
				  $allowed = array('application/pdf','application/force-download');
				  
				  if (!in_array($fileType,$allowed)){
					  echo "<script>
					  alert('File Sertifikat harus bertipe .pdf');
					  window.location=('akreditasi-prodi-edit-$_GET[kode].html');</script>";
				  } else {
					  $tipe = 'lolos';
				  }
				  
				  if($tipe == 'lolos'){
					  
						$myFile = $_FILES['fupload2'];
						
						// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex	
						$ubah = $myFile['name'];
						$name = 'File_Sertifikat_Prodi_'.preg_replace("/[^A-Z0-9._-]/i", "_", $prodi.$ubah);
						//$name = $_POST[jenis]."_".$nama_enkrip."_".$name;
						  
						// simpan file	  
						move_uploaded_file($myFile['tmp_name'], UPLOAD_DIR . $name);
						
					    mysqli_query ($con,"UPDATE akreditasi_prodi SET file_sertifikat 	 = '$name'
																		WHERE kode = '$_GET[kode]'");
										  
						echo "<script>
						window.location=('akreditasi-prodi-edit-$_GET[kode].html');</script>";
				  
				  }	
}
?>