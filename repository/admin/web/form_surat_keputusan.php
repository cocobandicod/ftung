<?php
function del_surat_keputusan($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_keputusan WHERE kode = '$kode'"));
	unlink("../berkas/$d[file_pendukung]");
	mysqli_query($con,"DELETE FROM surat_keputusan WHERE kode = '$kode'");	
	mysqli_query($con,"DELETE FROM berkas WHERE kode = '$kode'");	
	echo "<script>
    window.location=('surat-keputusan.html');</script>";
}
function input_surat_keputusan($con,$kode){
	require_once('../config/fungsi_upload_berkas.php');
	$s = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_keputusan WHERE kode = '$kode'"));	
	$p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));	
	$m = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE seo = 'surat-keputusan'"));	
?>
                    <?php
					if($_REQUEST[save]){
                                        $kode = rand(10000,100000);
										$enkript = base64_encode($con,$kode);
										$import="INSERT INTO surat_keputusan VALUES('$id',
                                                                               	   '$enkript',
																				   '$_POST[prodi]',
																				   '$_POST[judul]',
																				   '$_POST[tahun]',
																				   '$_POST[ket]',
																				   '')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					  

										mysqli_query($con,"INSERT INTO berkas VALUES('$id_berkas',
																			   '$enkript',
																			   '$m[id_menu]',
																			   '$_POST[judul]',
																			   '$_POST[ket]',
																			   '',
																			   '')");
                                    
									echo "<script>
                                    window.location=('surat-keputusan-edit-$enkript.html');</script>";
					}
					if($_REQUEST[update]){
						
						mysqli_query ($con,"UPDATE surat_keputusan SET id_prodi 	 	= '$_POST[prodi]',
																judul 			= '$_POST[judul]',
																tahun			= '$_POST[tahun]',
																ket				= '$_POST[ket]'
																WHERE kode = '$kode'");		

						mysqli_query ($con,"UPDATE berkas SET  judul 	= '$_POST[judul]'
														 WHERE kode 	= '$kode'");
                                    
									echo "<script>
                                    window.location=('surat-keputusan-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_file'){
					    $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM surat_keputusan WHERE kode = '$kode'"));
						unlink("../../berkas/$d[file_pendukung]");
					    mysqli_query ($con,"UPDATE surat_keputusan SET file_pendukung = '' WHERE kode = '$kode'");
						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '',
														ket				= ''
														WHERE kode = '$kode'");
						echo "<script>
						window.location=('surat-keputusan-edit-$_GET[kode].html');</script>";
					}
					?>
<form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
<div class="col-lg-6">                  
                    <table width="100%" class="table">
                    <tr>
                    <td>Judul</td>
                    <td><?= input('judul',$s[judul]); ?></td>
                    </tr>
                    <tr>
                      <td>Unit Kerja</td>
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
                      <td>Keterangan</td>
                      <td>
                      <textarea name="ket" class="form-control"><?=$s['ket'];?></textarea>
                      </td>
                    </tr>                 
                    </table>
</div>
<div class="col-lg-6">                    
                    <table width="100%" class="table">
                    <tr>
                      <td>Tahun</td>
                      <td><?= combothn(2012,date(Y),'tahun',$s[tahun]); ?></td>
                    </tr>
                    <tr>
                      <td>File Pendukung</td>
                      <td>
                           <?php 
						       if($_GET[id] == 'edit'){
							   if($s[file_pendukung] != NULL){ 
							   echo "<a href='../berkas/$s[file_pendukung]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-file-surat-keputusan-<?= $_GET[kode]; ?>.html" 
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
                      <a href="surat-keputusan.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="surat-keputusan.html">Kembali</a> | <a href="surat-keputusan-add.html">Tambah Ulang</a>
                      <?php } ?><br /><br />                 
                    </div>
                    </form>
                    <?php
					if (isset($_REQUEST['upload_1'])) {
                       echo upload_file_FILE($_POST[nama_prodi],'surat_keputusan','surat-keputusan','surat_keputusan');
                    }
					?>
<?php } ?>