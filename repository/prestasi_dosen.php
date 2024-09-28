<?php
function prestasi_dosen($con,$link){
?>
<h3>Tabel Pencapaian Prestasi/Reputasi Dosen FT UNG</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td rowspan="2"><strong>Tahun</strong></td>
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
<td colspan="3" bgcolor="<?= $j[warna]; ?>"><strong>Jurusan 
  <?= $j[nama_jurusan]; ?>
</strong></td>
<?php } ?>
</tr>
<tr align="center">
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
  <td bgcolor="<?= $j[warna]; ?>"><strong>Lokal</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>Nasional</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>Internasional</strong></td>
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
  $lok = mysqli_num_rows(mysqli_query($con,"SELECT * FROM prestasi_dosen p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND waktu_pencapaian = '$i'
									 AND tingkat = 'Lokal'"));
  if($lok == NULL){ echo ""; } else { echo $lok; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $nas = mysqli_num_rows(mysqli_query($con,"SELECT * FROM prestasi_dosen p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND waktu_pencapaian = '$i'
									 AND tingkat = 'Nasional'"));
									 
  if($nas == NULL){ echo ""; } else { echo $nas; }
  ?>
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $int = mysqli_num_rows(mysqli_query($con,"SELECT * FROM prestasi_dosen p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND waktu_pencapaian = '$i'
									 AND tingkat = 'Internasional'"));
  if($int == NULL){ echo ""; } else { echo $int; }
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
  $lok = mysqli_num_rows(mysqli_query($con,"SELECT * FROM prestasi_dosen p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tingkat = 'Lokal'"));
  if($lok == NULL){ echo ""; } else { echo $lok; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $nas = mysqli_num_rows(mysqli_query($con,"SELECT * FROM prestasi_dosen p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tingkat = 'Nasional'"));
  if($nas == NULL){ echo ""; } else { echo $nas; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $int = mysqli_num_rows(mysqli_query($con,"SELECT * FROM prestasi_dosen p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND waktu_pencapaian = '$i'
									 AND tingkat = 'Internasional'"));
  if($int == NULL){ echo ""; } else { echo $int; }
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
<h3>Tabel Pencapaian Prestasi/Reputasi Dosen <?= $p[nama_prodi]; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td><strong>No</strong></td>
<td><strong>Nama Dosen</strong></td>
<td><strong>Prestasi</strong></td>
<td><strong>Bidang </strong></td>
<td><strong>Waktu Pencapaian</strong></td>
<td><strong>Tingkat</strong></td>
<td><strong>File</strong></td>
</tr>
<?php
$no = 1;
if($_GET[prodi] == 'fakultas-teknik'){
$sqld = mysqli_query($con,"SELECT * FROM prestasi_dosen ORDER BY bidang,waktu_pencapaian,tingkat ASC");
} else {
$sqld = mysqli_query($con,"SELECT * FROM prestasi_dosen WHERE id_prodi = '$p[id_prodi]' ORDER BY bidang,waktu_pencapaian,tingkat ASC");	
}
while($a = mysqli_fetch_array($sqld)){
?>
<tr>
  <td width="2%"><?= $no; ?></td>
  <td><?= $a[nama_dosen] ?></td>
  <td><?= $a[prestasi] ?></td>
  <td><?= $a[bidang] ?></td>
  <td align="center"><?= $a[waktu_pencapaian] ?></td>
  <td><?= $a[tingkat] ?></td>
  <td>
  <?php
  if($a[file_pendukung] == NULL){ } else { 
  echo "<a href='$link"."berkas/$a[file_pendukung]' target='_blank'><img src='$link"."images/downicon.png'></a>";
  }
  ?>  
  </td>
</tr>
<?php $no++; } ?>
</table>
</div>
<?php } ?>
<?php } ?>