<?php

require_once('../config/fungsi_input.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/menu.php');
require_once('../../config/koneksi.php');
require_once('form.php');
?>
<!DOCTYPE html>
<html>
<?php echo head(); ?>
<body>
<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
        <?php echo menu(); ?>    
        </nav>
        <?php echo top(); ?>
        
	`	<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Pengelola</h2>
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
                        echo "<h5>Input Pengelola</h5>";
						} else if($_GET[id] == 'edit') {
						echo "<h5>Edit Pengelola</h5>";	
						} else {
						echo "<h5>Data Pengelola</h5>";		
						}?>
                  </div>
                  <div class="ibox-content">
                    <div class="col-lg-6">
                    <?php 
					if($_GET[id] == 'add') {
							echo input_pengelola($con,'');
					} else if($_GET[id] == 'edit') {
						    echo input_pengelola($con,$_GET[kode]);
					} else if($_GET[id] == 'del') {
						    echo del_pengelola($con,$_GET[kode]);
					} else {
						echo '<a href="pengelola-add.html" class="btn btn-primary">Tambah Data</a>';
					}
					?>
                    </div>
                    <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                    </div>
                    <table class="footable table table-stripped" data-page-size="15" data-filter=#filter>
                    <thead>
                    <tr>
                      <th>No</th>
                      <th data-hide="phone,tablet">Username</th>
                      <th>Nama Pengelola</th>
                      <th data-hide="phone,tablet">Email</th>
                      <th data-hide="phone,tablet">No. Telepon</th>
                      <th>Level</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  $no = 1;
					  $mysql = mysqli_query($con,"SELECT * FROM users ORDER BY id DESC");
					  while($s = mysqli_fetch_array($mysql)){
						  $kode = base64_encode($s[id]);
					  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?= $s[username]; ?></td>
                        <td><?= $s[nama_lengkap]; ?></td>
                        <td><?= $s[email]; ?></td>
                        <td><?= $s[no_telp]; ?></td>
                        <td>
						<?php
                        $e = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi 
															WHERE id_prodi = '$s[level]'"));
						if($s[level] == 'Administrator'){
							echo "Administrator";
						} else if($s[level] == 'PT'){
							echo "Universitas"; 
						} else {
							echo 'User Prodi '.$e[nama_prodi]; 
						}
						?>
                        </td>
                        <td>
						<?=
						edit('pengelola-edit-'.$kode.'.html');
						del('pengelola-del-'.$kode.'.html',$s[nama_lengkap]); 
						?>
                        </td>
                      </tr>
                      <?php $no++; } ?>
                    </tbody>
                    <tfoot>
                                <tr>
                                    <td colspan="17">
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