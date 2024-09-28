<?php

require_once('../config/fungsi_input.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/menu.php');
require_once('../../config/koneksi.php');
require_once('form_karya_ilmiah.php');
?>
<!DOCTYPE html>
<html>
<?php echo head(); ?>
<script>
function validate() {
	var file_size = $('#file')[0].files[0].size;
	if(file_size > 5000000) {
		alert('File harus kurang dari 5Mb');
		return false;
	} 
	return true;
}
</script>
<body>
<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
        <?php echo menu(); ?>    
        </nav>
        <?php echo top(); ?>       
	`	<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Karya Ilmiah Dosen</h2>
                </div>
                <div class="col-lg-2">

                </div>
        </div>
        
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">       
                <div class="col-lg-12">
                <div class="ibox float-e-margins">                 
                  <div class="ibox-title">
                        <?php if($_GET[id] == 'add') {
                        echo "<h5>Input Karya Ilmiah</h5>";
						} else if($_GET[id] == 'edit') {
						echo "<h5>Edit Karya Ilmiah</h5>";	
						} else {
						echo "<h5>Karya Ilmiah</h5>";		
						}?>
                  </div>
                  <div class="ibox-content">
                    <?php 
					if($_GET[id] == 'add') {
							echo input_karya_ilmiah($con,'');
					} else if($_GET[id] == 'edit') {
						    echo input_karya_ilmiah($con,$_GET[kode]);
					} else if($_GET[id] == 'del') {
						    echo del_karya_ilmiah($con,$_GET[kode]);
					} else {
						echo '<a href="karya-ilmiah-add.html" class="btn btn-primary" style="margin-left:5px;">Tambah Data</a>';
					}
					?>
                    <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                    </div>
                    <table class="footable table table-stripped" data-page-size="10" data-filter=#filter>
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Dosen</th>
                      <th data-hide="phone,tablet">Judul</th>
                      <th data-hide="phone,tablet">Dipublikasikan</th>
                      <th data-hide="phone,tablet">Tahun</th>
                      <th>Tingkat</th>
                      <th>File</th>
                      <th width="8%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  $no = 1;
					  $mysql = mysqli_query($con,"SELECT * FROM karya_ilmiah ORDER BY tahun,tingkat ASC");
					  while($s = mysqli_fetch_array($mysql)){
						  $p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));
					  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?= $s[nama_dosen]; ?></td>
                        <td><?= $s[judul]; ?></td>
                        <td><?= $s[publikasi]; ?></td>
                        <td><?= $s[tahun]; ?></td>
                        <td><?= $s[tingkat]; ?></td>
                        <td>
						<?php
						if($s[file_pendukung] == NULL){
							echo "-";
						} else {
							echo "<a href='../berkas/$s[file_pendukung]' class='label label-info '>Download</a>"; 
						}
						?>
                        </td>
                        <td>
                        <?=
						edit('karya-ilmiah-edit-'.$s[kode].'.html');
						del('karya-ilmiah-del-'.$s[kode].'.html',$s[nama_dosen]); 
						?>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                    <tfoot>
                                <tr>
                                    <td colspan="22">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                    </tfoot>
                    </table>                    
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
    <?php echo js4(); ?>
</body>
</html>