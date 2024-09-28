<?php

require_once('../config/fungsi_input.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/menu.php');
require_once('../../config/koneksi.php');
require_once('form_akreditasi_prodi.php');
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
                    <h2>Akreditasi Prodi</h2>
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
                        echo "<h5>Input Akreditasi Prodi</h5>";
						} else if($_GET[id] == 'edit') {
						echo "<h5>Edit Akreditasi Prodi</h5>";	
						} else {
						echo "<h5>Akreditasi Prodi</h5>";		
						}?>
                  </div>
                  <div class="ibox-content">
                    <?php 
					if($_GET[id] == 'add') {
							echo input_akreditasi_prodi($con,'');
					} else if($_GET[id] == 'edit') {
						    echo input_akreditasi_prodi($con,$_GET[kode]);
					} else if($_GET[id] == 'del') {
						    echo del_akreditasi_prodi($con,$_GET[kode]);
					} else {
						echo '<a href="akreditasi-prodi-add.html" class="btn btn-primary" style="margin-left:5px;">Tambah Data</a>';
					}
					?>
                    <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                    </div>
                    <table class="footable table table-stripped" data-page-size="10" data-filter=#filter>
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th data-hide="phone,tablet">Tahun</th>
                      <th>File</th>
                      <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  $no = 1;
					  $mysql = mysqli_query($con,"SELECT * FROM akreditasi_prodi ORDER BY tahun ASC");
					  while($s = mysqli_fetch_array($mysql)){
						  $p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE id_prodi = '$s[id_prodi]'"));
					  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?= $s[judul]; ?></td>
                        <td><?= $s[tahun]; ?></td>
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
						edit('akreditasi-prodi-edit-'.$s[kode].'.html');
						del('akreditasi-prodi-del-'.$s[kode].'.html',$s[judul]); 
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