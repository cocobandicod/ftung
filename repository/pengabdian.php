<?php
function pengabdian($con,$link){
?>
<h3>Tabel Capaian Pengabdian Dosen FT UNG</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td rowspan="2"><strong>Tahun</strong></td>
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
<td colspan="5" bgcolor="<?= $j[warna]; ?>"><strong>Jurusan 
  <?= $j[nama_jurusan]; ?>
</strong></td>
<?php } ?>
</tr>
<tr align="center">
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
  <td bgcolor="<?= $j[warna]; ?>"><strong>M</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>PT</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>DKS</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>IDN</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>ILN</strong></td>
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
  $m = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'
									 AND sumber_dana = 'M'"));
  if($m == NULL){ echo ""; } else { echo $m; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $pt = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'
									 AND sumber_dana = 'PT'"));
  if($pt == NULL){ echo ""; } else { echo $pt; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $dks = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'
									 AND sumber_dana = 'DKS'"));
  if($dks == NULL){ echo ""; } else { echo $dks; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $idn = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'
									 AND sumber_dana = 'IDN'"));
  if($idn == NULL){ echo ""; } else { echo $idn; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $iln = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'
									 AND sumber_dana = 'ILN'"));
  if($iln == NULL){ echo ""; } else { echo $iln; }
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
  $m = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND sumber_dana = 'M'"));
  if($m == NULL){ echo ""; } else { echo $m; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $pt = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND sumber_dana = 'PT'"));
  if($pt == NULL){ echo ""; } else { echo $pt; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $dks = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND sumber_dana = 'DKS'"));
  if($dks == NULL){ echo ""; } else { echo $dks; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $idn = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND sumber_dana = 'IDN'"));
  if($idn == NULL){ echo ""; } else { echo $idn; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $iln = mysqli_num_rows(mysqli_query($con,"SELECT * FROM pengabdian p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun = '$i'
									 AND sumber_dana = 'ILN'"));
  if($iln == NULL){ echo ""; } else { echo $iln; }
  ?>  
  </td>
<?php } ?>
</tr>
</table>
Keterangan :<br />
M = Mandiri<br />
PT = Perguruan Tinggi yang bersangkutan<br />
DKS = Depdiknas<br />
IDN = Institusi dalam negeri di luar Depdiknas<br />
ILN = Institusi luar negeri
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
<h3>Tabel Pengabdian Dosen <?= $p[nama_prodi]; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td><strong>No</strong></td>
<td><strong>Tahun</strong></td>
<td><strong>Judul Penelitian / Nama Dosen</strong></td>
<td><strong>Sumber Dana </strong></td>
<td><strong>File</strong></td>
</tr>
<?php
$no = 1;
if($_GET[prodi] == 'fakultas-teknik'){
	$sqld = mysqli_query($con,"SELECT * FROM pengabdian ORDER BY tahun ASC");
} else {
	$sqld = mysqli_query($con,"SELECT * FROM pengabdian WHERE id_prodi = '$p[id_prodi]' ORDER BY tahun ASC");	
}
while($pr = mysqli_fetch_array($sqld)){
?>
<tr>
  <td width="2%"><?= $no; ?></td>
  <td align="center"><?= $pr[tahun]; ?></td>
  <td><?= $pr[judul_penelitian]; ?></td>
  <td align="center"><?= $pr[sumber_dana]; ?></td>
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