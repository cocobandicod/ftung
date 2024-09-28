<?php
function kerja_sama($con,$link){
?>
<h3>Tabel Karya Kerja Sama Dalam & Luar Negeri FT UNG</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td rowspan="2"><strong>Tahun</strong></td>
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
<td colspan="2" bgcolor="<?= $j[warna]; ?>"><strong>Jurusan 
  <?= $j[nama_jurusan]; ?>
</strong></td>
<?php } ?>
</tr>
<tr align="center">
<?php
$sql = mysqli_query($con,"SELECT * FROM jurusan");
while($j = mysqli_fetch_array($sql)){
?>
  <td bgcolor="<?= $j[warna]; ?>"><strong>Dalam Negeri</strong></td>
  <td bgcolor="<?= $j[warna]; ?>"><strong>Luar Negeri</strong></td>
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
  $m = mysqli_num_rows(mysqli_query($con,"SELECT * FROM kerja_sama p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun_mulai = '$i'
									 AND jenis_kerjasama = 'IDL'"));
  if($m == NULL){ echo ""; } else { echo $m; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $n = mysqli_num_rows(mysqli_query($con,"SELECT * FROM kerja_sama p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND tahun_mulai = '$i'
									 AND jenis_kerjasama = 'ILN'"));
  if($n == NULL){ echo ""; } else { echo $n; }
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
  $m = mysqli_num_rows(mysqli_query($con,"SELECT * FROM kerja_sama p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND jenis_kerjasama = 'IDL'"));
  if($m == NULL){ echo ""; } else { echo $m; }
  ?>  
  </td>
  <td bgcolor="<?= $j[warna]; ?>">
  <?php 
  $n = mysqli_num_rows(mysqli_query($con,"SELECT * FROM kerja_sama p, prodi d 
  									 WHERE p.id_prodi = d.id_prodi
									 AND d.id_jurusan = '$j[id_jurusan]'
									 AND jenis_kerjasama = 'ILN'"));
  if($n == NULL){ echo ""; } else { echo $n; }
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
<h3>Tabel Kerja Sama Dalam & Luar Negeri <?= $p[nama_prodi]; ?></h3>
<div class="table-responsive">
<table class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
<tr align="center">
<td><strong>No</strong></td>
<td><strong>Nama Instansi</strong></td>
<td><strong>Jenis Kegiatan</strong></td>
<td><strong>Waktu Mulai</strong></td>
<td><strong>Waktu Berakhir</strong></td>
<td><strong>Jenis Kerjasama</strong></td>
<td><strong>File</strong></td>
</tr>
<?php
$no = 1;
if($_GET[prodi] == 'fakultas-teknik'){
	$sqld = mysqli_query($con,"SELECT * FROM kerja_sama ORDER BY tahun_mulai,jenis_kerjasama ASC");
} else {
	$sqld = mysqli_query($con,"SELECT * FROM kerja_sama WHERE id_prodi = '$p[id_prodi]' ORDER BY tahun_mulai,jenis_kerjasama ASC");	
}
while($pr = mysqli_fetch_array($sqld)){
?>
<tr>
  <td width="2%" align="center"><?= $no; ?></td>
  <td><?= $pr[instansi]; ?></td>
  <td><?= $pr[kegiatan]; ?></td>
  <td align="center"><?= $pr[tahun_mulai]; ?></td>
  <td align="center"><?= $pr[tahun_selesai]; ?></td>
  <td align="center"><?= $pr[jenis_kerjasama]; ?></td>
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