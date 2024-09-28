<?php
function haki($con,$link){
?>
<h3>Tabel Haki/Paten Dosen FT UNG</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td><strong>Tahun</strong></td>
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
<td bgcolor="<?= $j[warna]; ?>"><strong>Jurusan<?= $j[nama_jurusan]; ?></strong></td>
<?php } ?>
</tr>
<?php
$thn = date(Y);
for($i=2012; $i<=$thn; $i++){
?>
<tr align="center">
  <td><?= $i; ?></td>
  <?php
  $sql = mysqli_query($con,"SELECT * FROM jurusan");
  while($j = mysqli_fetch_array($sql)){
  ?>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $lok = mysqli_num_rows(mysqli_query($con,"SELECT * FROM haki p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'"));
  if($lok == NULL){ echo ""; } else { echo $lok; }
  ?>  
  </td>
  <?php } ?>
</tr>
<?php } ?>
<tr align="center">
  <td><strong>Total</strong></td>
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $lok = mysqli_num_rows(mysqli_query($con,"SELECT * FROM haki p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'"));
  if($lok == NULL){ echo ""; } else { echo $lok; }
  ?>  
  </td>
<?php } ?>
</tr>
</table>
</div>
<br>
<select name="" class="form-control" onchange="if (this.value) window.location.href=this.value">
<option value="" selected>Detail Berdasarkan Unit Kerja :</option>
<?php
$sql = mysqli_query($con,"SELECT * FROM prodi");
while($j = mysqli_fetch_array($sql)){
	if($_GET[prodi] == $j[seo_prodi]){
?>
<option value="<?= $link.$_GET[judul].'/prodi/'.$j[seo_prodi].'.html'; ?>" class="option" selected><?= $j[nama_prodi]; ?></option>
<?php } else { ?>
<option value="<?= $link.$_GET[judul].'/prodi/'.$j[seo_prodi].'.html'; ?>" class="option"><?= $j[nama_prodi]; ?></option>
<?php } } ?>
</select>
<br>
<?php if($_GET['get'] == 'prodi') {
	$p = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM prodi WHERE seo_prodi = '$_GET[prodi]'"));
?>
<h3>Tabel HaKI Dosen <?= $p[nama_prodi]; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td><strong>No</strong></td>
<td><strong>Karya</strong></td>
<td><strong>Pemegang Cipta</strong></td>
<td><strong>Tahun </strong></td>
<td><strong>File</strong></td>
</tr>
<?php
$no = 1;
if($_GET[prodi] == 'fakultas-teknik'){
	$sqld = mysqli_query($con,"SELECT * FROM haki ORDER BY tahun ASC");
} else {
	$sqld = mysqli_query($con,"SELECT * FROM haki WHERE id_prodi = '$p[id_prodi]' ORDER BY tahun ASC");	
}
while($pr = mysqli_fetch_array($sqld)){
?>
<tr>
  <td width="2%"><?= $no; ?></td>
  <td><?= $pr[karya]; ?></td>
  <td><?= $pr[pemegang_cipta]; ?></td>
  <td align="center"><?= $pr[tahun]; ?></td>
  <td align="center">
  <?php
  if($pr[file_pendukung] == NULL){ } else { 
  echo "<a href='$link"."berkas/$pr[file_pendukung]' target='_blank'><img src='$link"."images/downicon.png'></a>";
  }
  ?>  
  </td>
</tr>
<?php $no++; } ?>
</table>
</div>
<?php } ?>
<?php } ?>