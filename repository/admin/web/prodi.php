<?php

require_once('../config/fungsi_input.php');
require_once('../config/fungsi_indotgl.php');
require_once('../config/menu.php');
require_once('../config/koneksi.php');
require_once('form.php');
?>
<!DOCTYPE html>
<html>
<?php echo head2(); ?>
<body>
<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
        <?php echo menu(); ?>    
        </nav>
        <?php echo top(); ?>      
	`	<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Input Program Studi</h2>
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
                        echo "<h5>Input Program Studi</h5>";
						} else if($_GET[id] == 'edit') {
						echo "<h5>Edit Program Studi</h5>";	
						} else {
						echo "<h5>Data Program Studi</h5>";		
						}?>
                  </div>
                  <div class="ibox-content">
                    <div class="col-lg-6">
                    <?php 
					if($_GET[id] == 'add') {
							echo input_prodi($con,'');
					} else if($_GET[id] == 'edit') {
						    echo input_prodi($con,$_GET[kode]);
					} else if($_GET[id] == 'del') {
						    echo del_prodi($con,$_GET[kode]);
					} else {
						echo '<a href="prodi-add.html" class="btn btn-primary">Tambah Data</a>';
					}
					?>
                    </div>

                    <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                    </div>
                    <table class="footable table table-stripped" data-page-size="10" data-filter=#filter>
                    <thead>
                    <tr>
                      <th>No</th>
                      <th data-hide="phone,tablet">Fakultas</th>
                      <th>Jurusan</th>
                      <th data-hide="phone,tablet">Kode Prodi</th>
                      <th data-hide="phone,tablet">Strata</th>
                      <th>Nama Program Studi</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  $no = 1;
					  $mysql = mysqli_query($con,"SELECT * FROM prodi ORDER BY id_prodi ASC");
					  while($s = mysqli_fetch_array($mysql)){
						  $kode = base64_encode($s[id_prodi]);
						  $j = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM jurusan 
						  									  WHERE id_jurusan = '$s[id_jurusan]'"));
						  $f = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM fakultas 
						  									  WHERE id_fakultas = '$j[id_fakultas]'"));
					  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?= $f[nama_fakultas]; ?></td>
                        <td><?= $j[nama_jurusan]; ?></td>
                        <td><?= $s[kode_prodi]; ?></td>
                        <td><?= $s[strata]; ?></td>
                        <td><?= $s[nama_prodi]; ?></td>
                        <td>
                        <?=
						edit('prodi-edit-'.$kode.'.html');
						del('prodi-del-'.$kode.'.html',$s[nama_prodi]); 
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