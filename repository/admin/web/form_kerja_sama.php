<?php
function del_kerja_sama($con,$kode){
	$d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kerja_sama WHERE kode = '$kode'"));
	unlink("../berkas/$d[file_pendukung]");
	mysqli_query($con,"DELETE FROM kerja_sama WHERE kode = '$kode'");
	mysqli_query($con,"DELETE FROM berkas WHERE kode = '$kode'");	
	echo "<script>
    window.location=('kerja-sama.html');</script>";
}
function input_kerja_sama($con,$kode){
	require_once('../config/fungsi_upload_berkas.php');
	$s = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kerja_sama WHERE kode = '$kode'"));	
	$p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));
	$m = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM menu WHERE seo = 'kerja-sama'"));	
?>
                    <?php
					if($_REQUEST[save]){
                                        $kode = rand(10000,100000);
										$enkript = base64_encode($con,$kode);
										$import="INSERT INTO kerja_sama VALUES('$id',
                                                                               	   '$enkript',
																				   '$_POST[prodi]',
																				   '$_POST[instansi]',
																				   '$_POST[kegiatan]',
																				   '$_POST[tahun_mulai]',
																				   '$_POST[tahun_selesai]',
																				   '$_POST[jenis_kerjasama]',
																				   '$_POST[manfaat_dosen]',
																				   '$_POST[manfaat_mahasiswa]',
																				   '$_POST[manfaat_instansi]',
																				   '')";									   
                                        mysqli_query($con,$import) or die(mysql_error()); //Melakukan Import 					  
 
										mysqli_query($con,"INSERT INTO berkas VALUES('$id_berkas',
																			   '$enkript',
																			   '$m[id_menu]',
																			   '$_POST[kegiatan]',
																			   '$_POST[instansi]',
																			   '',
																			   '')");
                                    
									echo "<script>
                                    window.location=('kerja-sama-edit-$enkript.html');</script>";
					}
					if($_REQUEST[update]){

						mysqli_query ($con,"UPDATE kerja_sama SET id_prodi 				= '$_POST[prodi]',
																instansi 	 		= '$_POST[instansi]',
																kegiatan 	 		= '$_POST[kegiatan]',
																tahun_mulai 	 	= '$_POST[tahun_mulai]',
																tahun_selesai 	 	= '$_POST[tahun_selesai]',
																jenis_kerjasama 	= '$_POST[jenis_kerjasama]',
																manfaat_dosen 	 	= '$_POST[manfaat_dosen]',
																manfaat_mahasiswa	= '$_POST[manfaat_mahasiswa]',
																manfaat_instansi	= '$_POST[manfaat_instansi]'
																WHERE kode 		 	= '$kode'");		

						mysqli_query ($con,"UPDATE berkas SET  judul 	= '$_POST[kegiatan]',
														 isi 	= '$_POST[instansi]'
														 WHERE kode 	= '$kode'");
                                    
									echo "<script>
                                    window.location=('kerja-sama-edit-$kode.html');</script>";
					}
					if($_GET[act] == 'del_file'){
					    $d = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kerja_sama WHERE kode = '$kode'"));
						unlink("../../berkas/$d[file_pendukung]");
					    mysqli_query ($con,"UPDATE kerja_sama SET file_pendukung = '' WHERE kode = '$kode'");
						mysqli_query ($con,"UPDATE berkas SET file_pendukung  = '',
														ket				= ''
														WHERE kode = '$kode'");
						echo "<script>
						window.location=('kerja-sama-edit-$_GET[kode].html');</script>";
					}
					?>

<form method="post" action="" enctype="multipart/form-data" id="frmFile" onSubmit="return validate();">
<div class="col-lg-6">                  
                    <table width="100%" class="table">
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
                      <td>Nama Instansi</td>
                      <td><?= input('instansi',$s[instansi]); ?></td>
                    </tr>
                    <tr>
                      <td>Jenis Kegiatan</td>
                      <td><?= input('kegiatan',$s[kegiatan]); ?></td>
                    </tr>
                    <tr>
                    <td>Tahun Mulai</td>
                    <td><?= combothn(2000,date(Y)+17,'tahun_mulai',$s[tahun_mulai]); ?></td>
                    </tr>
                    <tr>
                    <td>Tahun Selesai</td>
                    <td><?= combothn(2000,date(Y)+17,'tahun_selesai',$s[tahun_selesai]); ?></td>
                    </tr>                 
                    </table>
</div>
<div class="col-lg-6">                    
                    <table width="100%" class="table">
                    <tr>
                      <td>Jenis Kerja Sama</td>
                      <td><?= jenis_kerjasama('jenis_kerjasama',$s[jenis_kerjasama]); ?></td>
                    </tr>
                    <tr>
                      <td>Manfaat Bagi Mahasiswa</td>
                      <td><?= input('manfaat_mahasiswa',$s[manfaat_mahasiswa]); ?></td>
                    </tr>
                    <tr>
                      <td>Manfaat Bagi Dosen</td>
                      <td><?= input('manfaat_dosen',$s[manfaat_dosen]); ?></td>
                    </tr>
                    <tr>
                      <td>Manfaat Bagi Instansi</td>
                      <td><?= input('manfaat_instansi',$s[manfaat_instansi]); ?></td>
                    </tr>
                    <tr>
                      <td>File Pendukung</td>
                      <td>
                           <?php 
						       if($_GET[id] == 'edit'){
							   if($s[file_pendukung] != NULL){ 
							   echo "<a href='../berkas/$s[file_pendukung]' class='label label-info '>Download</a>";
							   ?>
                                <a href="delete-file-kerja-sama-<?= $_GET[kode]; ?>.html" 
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
                      <a href="kerja-sama.html">Kembali</a>
                      <?php } else { ?>
                      <input type="submit" class="btn btn-primary" value="Update" name="update" /> |
                      <a href="kerja-sama.html">Kembali</a>
                      <?php } ?><br /><br />                 
                    </div>
                    </form>
                    <?php
					if (isset($_REQUEST['upload_1'])) {
                       echo upload_file_kerja_sama($_POST[nama_prodi]);
                    }
					?>
<?php } ?>