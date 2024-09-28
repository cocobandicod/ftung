<?php
function del_prestasi_dosen($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prestasi_dosen WHERE kode = '$kode'"));
	unlink("../berkas/$d[file_pendukung]");
	mysqli_query($con,"DELETE FROM prestasi_dosen WHERE kode = '$kode'");	
	mysqli_query($con,"DELETE FROM berkas WHERE kode = '$kode'");	
	echo "<script>
    window.location=('prestasi-dosen.html');</script>";
}
function input_prestasi_dosen($con,$kode){
	require_once('../config/fungsi_upload_berkas.php');
	$s = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prestasi_dosen WHERE kode = '$kode'"));	
	$p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));	
	$m = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE seo = 'prestasi-dosen'"));
?>
                    <?php
					if($_REQUEST[save]){
                                        $kode = rand(10000,100000);
										$enkript = base64_encode($con,$kode);
										$import="INSERT INTO prestasi_dosen VALUES('$id',
                                                                               	   '$enkript',
																				   '$_POST[prodi]',
																				   '$_POST[nama_dosen]',
																				   '$_POST[prestasi]',
																				   '$_POST[bidang]',
																				   '$_POST[waktu_pencapaian]',
																				   '$_POST[tingkat]',
																				   '')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					  

										mysqli_query($con,"INSERT INTO berkas VALUES('$id_berkas',
																			   '$enkript',
																			   '$m[id_menu]',
																			   '$_POST[prestasi]',
																			   '$_POST[nama_dosen]',
																			   '',
																			   '')");
                                    
									echo "<script>
                                    window.location=('prestasi-dosen-edit-$enkript.html');</script>";
					}
					if($_REQUEST[update]){

						mysqli_query ($con,"UPDATE prestasi_dosen SET id_prodi 	 		= '$_POST[prodi]',
																nama_dosen 		 	= '$_POST[nama_dosen]',
																prestasi 	 		= '$_POST[prestasi]',
																bidang				= '$_POST[bidang]',
																waktu_pencapaian	= '$_POST[waktu_pencapaian]',
																tingkat				= '$_POST[tingkat]'
																WHERE kode = '$kode'");		

						mysqli_query ($con,"UPDATE berkas SET  judul 	= '$_POST[prestasi]',
														 isi 	= '$_POST[nama_dosen]'
														 WHERE kode 	= '$kode'");
                                    
									echo "<script>
                                    window.location=('prestasi-dosen-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_file'){
					    $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prestasi_dosen WHERE kode = '$kode'"));
						unlink("../../berkas/$d[file_pendukung]");
					    mysqli_query ($con,"UPDATE prestasi_dosen SET file_pendukung = '' WHERE kode = '$kode'");
						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '',
														ket				= ''
														WHERE kode = '$kode'");
						echo "<script>
						window.location=('prestasi-dosen-edit-$_GET[kode].html');</script>";
					}
					?>
<form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
<div class="col-lg-6">                  
                    <table width="100%" class="table">
                    <tr>
                    <td>Nama Dosen</td>
                    <td><?= dosen('nama_dosen',$s[nama_dosen]); ?></td>
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
                      <td>Prestasi</td>
                      <td><?= input('prestasi',$s[prestasi]); ?></td>
                    </tr>                   
                    <tr>
                      <td>Bidang</td>
                      <td><?= bidang_prestasi('bidang',$s[bidang]); ?></td>
                    </tr>
                    </table>
</div>
<div class="col-lg-6">                    
                    <table width="100%" class="table">
                    <tr>
                      <td>Waktu Pencapaian</td>
                      <td><?= combothn(2010,date(Y),'waktu_pencapaian',$s[waktu_pencapaian]); ?></td>
                    </tr>
                    <tr>
                      <td>Tingkat</td>
                      <td><?= tingkat('tingkat',$s[tingkat]); ?></td>
                    </tr>
                    <tr>
                      <td>File Pendukung</td>
                      <td>
                           <?php 
						       if($_GET[id] == 'edit'){
							   if($s[file_pendukung] != NULL){ 
							   echo "<a href='../berkas/$s[file_pendukung]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-file-pendukung-dosen-<?= $_GET[kode]; ?>.html" 
                    			onClick="return confirm('Menghapus File Pendukung ?')" 
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
							   <input type="file" id="file" name="fupload1">
                               <input type="hidden" name="nama_prodi" value="<?= $p[nama_prodi]; ?>" />
							   </span>
							   <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							   </div>
                               <input type="submit" name="upload_1" value="Upload" class="btn btn-primary">
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
                      <a href="prestasi-dosen.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="prestasi-dosen.html">Kembali</a>
                      <?php } ?><br /><br />                 
                    </div>
                    </form>
                    <?php
					if (isset($_REQUEST['upload_1'])) {
                       echo upload_file_pendukung_dosen($_POST[nama_prodi],$s[nama_dosen]);
                    }
					?>
<?php } ?>