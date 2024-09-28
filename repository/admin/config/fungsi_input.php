<?php
function input($name, $value)
{
	echo "<input type='text' name='$name' class='form-control focused' required value='$value'>";
}

function input_pass($name,$value)
{
	if($value != NULL){
	   $required = '';
	   $ket = 'Kosongkan jika tidak merubah password';
	} else {
	   $required = 'required';
	}
	echo "<input type='password' name='$name' $required class='form-control focused'>";
	echo $ket;
}

function textarea($name, $value)
{
	echo "<textarea name='$name' class='form-control focused' required>$value</textarea>";
}

function level($value){
echo "<select name='level' class='chosen-select'  tabindex='2' required>";
echo "<option value='Administrator' selected>Administrator</option>";
$sqld = mysqli_query($con,"SELECT * FROM prodi");
while($p = mysqli_fetch_array($sqld)){
	if($p[id_prodi] == $value){
		echo "<option value='$p[id_prodi]' selected='selected'>Prodi $p[nama_prodi]</option>";
	} else {
		echo "<option value='$p[id_prodi]'>Prodi $p[nama_prodi]</option>";
	}
}
echo "</select>";
}

function bidang_prestasi($name,$value){
$jur = array("Penelitian","Pengabdian","Prestasi","Kegiatan","Kompetensi");
$jum = count($jur);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=4; $jum++){
      if ($jur[$jum] == $value)
         echo "<option value=$jur[$jum] selected>$jur[$jum]</option>";
      else
        echo "<option value=$jur[$jum]>$jur[$jum]</option>";
}
echo "</select> ";
}

function sumber_dana($name,$value){
$jur = array("M","PT","DKS","IDN","ILN");
$jum = count($jur);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=4; $jum++){
      if ($jur[$jum] == $value)
         echo "<option value=$jur[$jum] selected>$jur[$jum]</option>";
      else
        echo "<option value=$jur[$jum]>$jur[$jum]</option>";
}
echo "</select> ";
}

function jenis_kerjasama($name,$value){
$jus = array("Instansi Dalam Negeri","Instansi Luar Negeri");
$jur = array("IDL","ILN");
$jum = count($jur);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=1; $jum++){
      if ($jur[$jum] == $value)
         echo "<option value=$jur[$jum] selected>$jus[$jum]</option>";
      else
        echo "<option value=$jur[$jum]>$jus[$jum]</option>";
}
echo "</select> ";
}

function tingkat($name,$value){
$jur = array("Lokal","Nasional","Internasional");
$jum = count($jur);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=2; $jum++){
      if ($jur[$jum] == $value)
         echo "<option value=$jur[$jum] selected>$jur[$jum]</option>";
      else
        echo "<option value=$jur[$jum]>$jur[$jum]</option>";
}
echo "</select> ";
}

function dosen($name,$value){
echo "<select name='$name' class='chosen-select'  tabindex='2' required>";
echo "<option value='' selected>Pilih --</option>";	
$sqld = mysqli_query($con,"SELECT * FROM dosen");
while($p = mysqli_fetch_array($sqld)){
	if($p[nama_dosen] == $value){
		echo "<option value='$p[nama_dosen]' selected='selected'>$p[nama_dosen]</option>";
	} else {
		echo "<option value='$p[nama_dosen]'>$p[nama_dosen]</option>";
	}
}
echo "</select>";
}

function prodi($value){
echo "<select name='prodi' class='chosen-select'  tabindex='2' required>";
echo "<option value='' selected>Pilih --</option>";	
$sqld = mysqli_query($con,"SELECT * FROM prodi");
while($p = mysqli_fetch_array($sqld)){
	if($p[id_prodi] == $value){
		echo "<option value='$p[id_prodi]' selected='selected'>$p[nama_prodi]</option>";
	} else {
		echo "<option value='$p[id_prodi]'>$p[nama_prodi]</option>";
	}
}
echo "</select>";
}

function prodi2($value){
echo "<select name='prodi' class='form-control focused'  tabindex='2' required>";
$sqld = mysqli_query($con,"SELECT * FROM prodi");
while($p = mysqli_fetch_array($sqld)){
	if($p[id_prodi] == $value){
		echo "<option value='$p[id_prodi]' selected='selected'>$p[strata] - $p[nama_prodi]</option>";
	}
}
echo "</select>";
}

function bidang_ilmu($value){
echo "<select name='bidang_ilmu' class='chosen-select'  tabindex='2' required>";
echo "<option value='' selected>Pilih --</option>";	
$sql = mysqli_query($con,"SELECT * FROM bidang_ilmu");
while($b = mysqli_fetch_array($sql)){
	if($b[bidang_ilmu] == $value){
		echo "<option value='$b[bidang_ilmu]' selected='selected'>$b[bidang_ilmu]</option>";
	} else {
		echo "<option value='$b[bidang_ilmu]'>$b[bidang_ilmu]</option>";
	}
}
echo "</select>";
}

function modus($value){
?>
    <div class="radio radio-info radio-inline">
         <?php if($value == 'Tatap Muka') { ?>
         <input type="radio" id="inlineRadio1" value="Tatap Muka" name="modus_pembelajaran" checked="">
         <?php } else { ?>
         <input type="radio" id="inlineRadio1" value="Tatap Muka" name="modus_pembelajaran" checked="">
         <?php } ?>
         <label for="inlineRadio1"> Tatap Muka </label>
    </div>
    <div class="radio radio-inline">
         <?php if($value == 'Jarak Jauh') { ?>
         <input type="radio" id="inlineRadio2" value="Jarak Jauh" name="modus_pembelajaran" checked="">
         <?php } else { ?>
         <input type="radio" id="inlineRadio2" value="Jarak Jauh" name="modus_pembelajaran">
         <?php } ?>
         <label for="inlineRadio2"> Jarak Jauh </label>
    </div>
<?php
}

function akreditasi($name,$value){
?>
    <div class="radio radio-info radio-inline">
         <?php if($value == 'Akreditasi Pertama') { ?>
         <input type="radio" id="inlineRadio1" value="Akreditasi Pertama" name="<?= $name; ?>" checked="">
         <?php } else { ?>
         <input type="radio" id="inlineRadio1" value="Akreditasi Pertama" name="<?= $name; ?>" checked="">
         <?php } ?>
         <label for="inlineRadio1"> Akreditasi Pertama</label>
    </div>
    <div class="radio radio-inline">
         <?php if($value == 'Reakreditasi') { ?>
         <input type="radio" id="inlineRadio2" value="Reakreditasi" name="<?= $name; ?>" checked="">
         <?php } else { ?>
         <input type="radio" id="inlineRadio2" value="Reakreditasi" name="<?= $name; ?>">
         <?php } ?>
         <label for="inlineRadio2"> Reakreditasi</label>
    </div>
<?php
}

function wilayah($name, $terpilih)
{
echo"<select name='$name' class='form-control' required>
<option selected value=''></option>";
require_once('koneksi.php');
	$query = mysqli_query($con,"SELECT * FROM kecamatan ORDER BY id ASC");
	while($sql = mysqli_fetch_array($query))
	{
		if ($sql[id] == $terpilih){
			echo "<option value='$sql[id]' selected='selected'>$sql[nama_wilayah]</option>";
		} else {
			echo "<option value='$sql[id]'>$sql[nama_wilayah]</option>";
		}
			
	}
echo "</select>";
}

function wilayah2($name, $terpilih)
{
echo"<select name='$name' class='form-control' required>
<option selected value='Semua'>Semua</option>";
require_once('koneksi.php');
	$query = mysqli_query($con,"SELECT * FROM kecamatan ORDER BY id ASC");
	while($sql = mysqli_fetch_array($query))
	{
		if ($sql[id] == $terpilih){
			echo "<option value='$sql[id]' selected='selected'>$sql[nama_wilayah]</option>";
		} else {
			echo "<option value='$sql[id]'>$sql[nama_wilayah]</option>";
		}
			
	}
echo "</select>";
}

function fakultas($name, $terpilih)
{
echo"<select name='$name' class='form-control' required>
<option selected value=''>Pilih --</option>";
	$query = mysqli_query($con,"SELECT * FROM fakultas ORDER BY id_fakultas ASC");
	while($sql = mysqli_fetch_array($query))
	{
		if ($sql[id_fakultas] == $terpilih){
			echo "<option value='$sql[id_fakultas]' selected='selected'>$sql[nama_fakultas]</option>";
		} else {
			echo "<option value='$sql[id_fakultas]'>$sql[nama_fakultas]</option>";
		}
			
	}
echo "</select>";
}

function strata($name,$value){
$jur = array("D3","S1","S2");
$jum = count($jur);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=2; $jum++){
      if ($jur[$jum] == $value)
         echo "<option value=$jur[$jum] selected>$jur[$jum]</option>";
      else
        echo "<option value=$jur[$jum]>$jur[$jum]</option>";
}
echo "</select> ";
}

function hari($name,$value){
$jur = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$jum = count($jur);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=5; $jum++){
      if ($jur[$jum] == $value)
         echo "<option value=$jur[$jum] selected>$jur[$jum]</option>";
      else
        echo "<option value=$jur[$jum]>$jur[$jum]</option>";
}
echo "</select> ";
}

function edit($url)
{
	echo "<a href='$url' class='label label-info'>Edit</a>";
}

function detail($url)
{
	echo "<a href='$url' class='btn btn-default' style='color:blue'>Detail</a>";
}

function del($url,$nama)
{
	?>
	<a href="<?php echo "$url"; ?>" class="label label-danger" onClick="return confirm('Anda akan menghapus <?php echo "$nama"; ?>')">Del</a>
	<?php
}

function kelamin($name,$terpilih){
$status = array("Laki-Laki","Perempuan");
$jum = count($status);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=1; $jum++){
      if ($status[$jum] == $terpilih)
         echo "<option value=$status[$jum] selected>$status[$jum]</option>";
      else
        echo "<option value=$status[$jum]>$status[$jum]</option>";
}
echo "</select> ";
}


function tgl_lahir($value,$title){

  $tanggal = substr($value,8,2);
  $bulan   = substr($value,5,2);
  $tahun   = substr($value,0,4);
  
  echo "<select name='tgl' class='required' title='$title'>";
  echo "<option value='' selected> Pilih --</option>";
  for ($i=1; $i<=31; $i++){
    $lebar=strlen($i);
    switch($lebar){
      case 1:
      {
        $g="0".$i;
        break;     
      }
      case 2:
      {
        $g=$i;
        break;     
      }      
    }  
    if ($i==$tanggal)
      echo "<option value=$g selected>$g</option>";
    else
      echo "<option value=$g>$g</option>";
  }
  echo "</select> ";
  
  
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name='bln' class='required' title='$title'>";
  echo "<option value='' selected> Pilih --</option>";
  for ($bln=1; $bln<=12; $bln++){
      if ($bln==$bulan)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
  }
  echo "</select> ";  

  echo "<input type='text' name='thn' class='required' value='$tahun' title='$title' style='width:15%'>";
  
}

function tgl_lahir2($value,$title){

  $tanggal = substr($value,8,2);
  $bulan   = substr($value,5,2);
  $tahun   = substr($value,0,4);
  
  echo "<select name='tgl2' class='required' title='$title'>";
  echo "<option value='' selected> Pilih --</option>";
  for ($i=1; $i<=31; $i++){
    $lebar=strlen($i);
    switch($lebar){
      case 1:
      {
        $g="0".$i;
        break;     
      }
      case 2:
      {
        $g=$i;
        break;     
      }      
    }  
    if ($i==$tanggal)
      echo "<option value=$g selected>$g</option>";
    else
      echo "<option value=$g>$g</option>";
  }
  echo "</select> ";
  
  
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name='bln2' class='required' title='$title'>";
  echo "<option value='' selected> Pilih --</option>";
  for ($bln=1; $bln<=12; $bln++){
      if ($bln==$bulan)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
  }
  echo "</select> ";  

  echo "<input type='text' name='thn2' class='required' value='$tahun' title='$title' style='width:15%'>";
  
}

function combonamabln($awal, $akhir, $var, $terpilih){
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name='$var' class='form-control focused' required>";
  echo "<option value='' selected> Pilih --</option>";
  for ($bln=$awal; $bln<=$akhir; $bln++){
      if ($bln==$terpilih)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
  }
  echo "</select> ";
}

function combothn($awal, $akhir, $var, $terpilih){
  echo "<select name='$var' class='form-control focused' required>";
  echo "<option value=''>Pilih --</option>";
      if($terpilih == 'Masih Berlangsung')
        echo "<option value='Masih Berlangsung' selected='selected'>Masih Berlangsung</option>";
      else 
        echo "<option value='Masih Berlangsung'>Masih Berlangsung</option>";  
  for ($i=$awal; $i<=$akhir; $i++){
    if ($i == $terpilih)
      echo "<option value=$i selected='selected'>$i</option>";
    else 
      echo "<option value=$i>$i</option>";
  }
  echo "</select> ";
}

function umur($tanggal){
    list($tahun,$bulan,$hari) = explode("-",$tanggal);
    $format_tahun  = date("Y") - $tahun;
    $format_bulan = date("m") - $bulan;
    $format_hari   = date("d") - $hari;
    if ($format_hari < 0 || $format_bulan < 0)
      $format_tahun--;
    return $format_tahun;
}

?>