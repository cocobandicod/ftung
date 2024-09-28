<?php
function del_rencana_strategis($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rencana_strategis WHERE kode = '$kode'"));
	unlink("../berkas/$d[file_pendukung]");
	mysqli_query($con,"DELETE FROM rencana_strategis WHERE kode = '$kode'");	
	mysqli_query($con,"DELETE FROM berkas WHERE kode = '$kode'");	
	echo "<script>
    window.location=('rencana-strategis.html');</script>";
}
function input_rencana_strategis($con,$kode){
	require_once('../config/fungsi_upload_berkas.php');
	$s = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rencana_strategis WHERE kode = '$kode'"));	
	$p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));	
	$m = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE seo = 'rencana-strategis'"));	
?>
                    <?php
					if($_REQUEST[save]){
                                        $kode = rand(10000,100000);
										$enkript = base64_encode($con,$kode);
										$import="INSERT INTO rencana_strategis VALUES('$id',
                                                                               	   '$enkript',
																				   '$_POST[prodi]',
																				   '$_POST[judul]',
																				   '$_POST[tahun]',
																				   '')";
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					  

										mysqli_query($con,"INSERT INTO berkas VALUES('$id_berkas',
																			   '$enkript',
																			   '$m[id_menu]',
																			   '$_POST[judul]',
																			   '',
																			   '',
																			   '')");
                                    
									echo "<script>
                                    window.location=('rencana-strategis-edit-$enkript.html');</script>";
					}
					if($_REQUEST[update]){
						
						mysqli_query ($con,"UPDATE rencana_strategis SET id_prodi 	 	= '$_POST[prodi]',
																judul 				= '$_POST[judul]',
																tahun				= '$_POST[tahun]'
																WHERE kode = '$kode'");		

						mysqli_query ($con,"UPDATE berkas SET  judul 	= '$_POST[judul]'
														 WHERE kode 	= '$kode'");
                                    
									echo "<script>
                                    window.location=('rencana-strategis-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_file'){
					    $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rencana_strategis WHERE kode = '$kode'"));
						unlink("../../berkas/$d[file_pendukung]");
					    mysqli_query ($con,"UPDATE rencana_strategis SET file_pendukung = '' WHERE kode = '$kode'");
						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '',
														ket				= ''
														WHERE kode = '$kode'");
						echo "<script>
						window.location=('rencana-strategis-edit-$_GET[kode].html');</script>";
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
                                <a href="delete-file-rencana-strategis-<?= $_GET[kode]; ?>.html" 
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
                      <a href="rencana-strategis.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="rencana-strategis.html">Kembali</a>
                      <?php } ?><br /><br />                 
                    </div>
                    </form>
                    <?php
					if (isset($_REQUEST['upload_1'])) {
                       echo upload_file_FILE($_POST[nama_prodi],'Rencana_Stategis','rencana-strategis','rencana_strategis');
                    }
					?>
<?php } ?>