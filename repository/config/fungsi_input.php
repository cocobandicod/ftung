<?php
function input($name, $value)
{
	echo "<input type='text' name='$name' class='form-control focused' required value='$value'>";
}

function textarea($name, $value)
{
	echo "<textarea name='$name' class='form-control focused' required>$value</textarea>";
}

function jenis($name,$value){
$level = array("Laporan Magang","Laporan Kerja Praktek","D3 Tugas Akhir","S1 Skripsi","Karya Ilmiah Dosen");
$jum = count($level);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=4; $jum++){
      if ($level[$jum] == $value)
         echo "<option value=".str_replace(' ','-',$level[$jum])." selected>".$level[$jum]."</option>";
      else
        echo "<option value=".str_replace(' ','-',$level[$jum]).">$level[$jum]</option>";
}
echo "</select> ";
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
require_once('koneksi.php');
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

function level($name,$value){
$level = array("Operator","Administrator");
$jum = count($level);
echo "<select name='$name' class='form-control' required>";
echo "<option value='' selected>Pilih --</option>";
for ($jum=0; $jum<=1; $jum++){
      if ($level[$jum] == $value)
         echo "<option value=$level[$jum] selected>$level[$jum]</option>";
      else
        echo "<option value=$level[$jum]>$level[$jum]</option>";
}
echo "</select> ";
}

function input_disable($name, $value, $title)
{
	echo "<input type='text' name='$name' class='required' value='$value' title='$title' style='width:100%' readonly='readonly'>";
}

function pass($name, $value, $title)
{
	echo "<input type='password' name='$name' class='required' value='$value' title='$title' style='width:100%'>";
}

function pass_edit($name, $value, $title)
{
	echo "<input type='password' name='$name' value='$value' title='$title' style='width:100%'>";
}

function edit($url)
{
	echo "<a href='$url' class='btn btn-default' style='color:#093'>Edit</a>";
}

function detail($url)
{
	echo "<a href='$url' class='btn btn-default' style='color:blue'>Detail</a>";
}

function del($url,$nama)
{
	?>
	<a href="<?php echo "$url"; ?>" class="btn btn-default" onClick="return confirm('Anda akan menghapus <?php echo "$nama"; ?>')" style="color:#F00;">Del</a>
	<?php
}

function rangking($value,$title){
	
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