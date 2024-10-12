<?php
date_default_timezone_set('Asia/Makassar'); // PHP 6 mengharuskan penyebutan timezone.

function anti_injection($data)
{
	$filter = (htmlspecialchars($data, ENT_QUOTES));
	return $filter;
}

function random_char()
{
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	$rand = substr(str_shuffle($permitted_chars), 0, 10);
	return $rand;
}

function seo_title($s)
{
	$c = array(' ');
	$d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');

	$s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

	$s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	return $s;
}

function unseo_title($s)
{
	$c = array(' ');
	$d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');

	$s = str_replace($d, ' ', $s); // Hilangkan karakter yang telah disebutkan di array $d

	return $s;
}

function get_string_between($string, $start, $end)
{
	$string = ' ' . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return '';
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}

function encrypt_decrypt($string, $action = 'encrypt')
{
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
	$secret_iv = '5fgf5HJ5g27'; // user define secret key
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
	if ($action == 'encrypt') {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	} else if ($action == 'decrypt') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	return $output;
}

function login_validate()
{
	$timer = 60000;
	$_SESSION['expires_by'] = time() + $timer;
}

function login_check($url)
{
	$exp_time = $_SESSION['expires_by'];
	if (time() < $exp_time) {
		login_validate();
		return true;
	} else {
		unset($_SESSION['expires_by']);
		session_destroy();
		echo "<script>alert('Anda terlalu lama mengabaikan saya!'); 
		document.location='" . $url . "'</script>";
		return false;
	}
}

function login_check2($url)
{
	$exp_time = $_SESSION['expires_by'];
	if (time() < $exp_time) {
		login_validate();
		return true;
	} else {
		unset($_SESSION['expires_by']);
		session_destroy();
		echo "<script>alert('Anda terlalu lama mengabaikan saya!'); 
		document.location='" . $url . "pengelola'</script>";
		return false;
	}
}

function kategori($var, $terpilih)
{
	$jk = array(1 => "dokumen-mutu-ung", "laporan-audit", "laporan-survey", "laporan-monev", "pedoman-panduan", "laporan-rtm");
	echo "<select name='$var' id='$var' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	for ($i = 1; $i <= 6; $i++) {
		if ($jk[$i] == $terpilih) {
			echo '<option value="' . $jk[$i] . '" selected>' . strtoupper(str_replace('-', ' ', $jk[$i])) . '</option>';
		} else {
			echo '<option value="' . $jk[$i] . '">' . strtoupper(str_replace('-', ' ', $jk[$i])) . '</option>';
		}
	}
	echo "</select> ";
}

function kebijakan($var, $terpilih)
{
	$jk = array(1 => "Kebijakan-Fakultas", "Kebijakan-Pemerintah-Pusat", "Kebijakan-Universitas");
	echo "<select name='$var' id='$var' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	for ($i = 1; $i <= 3; $i++) {
		if ($jk[$i] == $terpilih) {
			echo '<option value="' . $jk[$i] . '" selected>' . strtoupper(str_replace('-', ' ', $jk[$i])) . '</option>';
		} else {
			echo '<option value="' . $jk[$i] . '">' . strtoupper(str_replace('-', ' ', $jk[$i])) . '</option>';
		}
	}
	echo "</select> ";
}

function publish($var, $terpilih)
{
	$jk = array(1 => "Yes", "No");
	echo "<select name='$var' id='$var' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	for ($i = 1; $i <= 2; $i++) {
		if ($jk[$i] == $terpilih) {
			echo '<option value="' . $jk[$i] . '" selected>' . str_replace('-', ' ', $jk[$i]) . '</option>';
		} else {
			echo '<option value="' . $jk[$i] . '">' . str_replace('-', ' ', $jk[$i]) . '</option>';
		}
	}
	echo "</select> ";
}

function jenis($var, $terpilih)
{
	$jk = array(1 => "Jurusan", "Fakultas", "Laboratorium");
	echo "<select name='$var' id='$var' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	for ($i = 1; $i <= 3; $i++) {
		if ($jk[$i] == $terpilih) {
			echo '<option value="' . $jk[$i] . '" selected>' . str_replace('-', ' ', $jk[$i]) . '</option>';
		} else {
			echo '<option value="' . $jk[$i] . '">' . str_replace('-', ' ', $jk[$i]) . '</option>';
		}
	}
	echo "</select> ";
}

function jurusan($proses, $terpilih)
{
	echo "<select name='id_jurusan' id='id_jurusan' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	$sql = $proses->tampil_data_select('*', 'jurusan', '1=1 ORDER BY id_jurusan ASC');
	foreach ($sql as $row) {
		if ($row['id_jurusan'] == $terpilih) {
			echo '<option value="' . $row['id_jurusan'] . '" selected>' . $row['nama_jurusan'] . '</option>';
		} else {
			echo '<option value="' . $row['id_jurusan'] . '">' . $row['nama_jurusan'] . '</option>';
		}
	}
	echo "</select> ";
}

function jurusan2($proses, $terpilih)
{
	echo "<select name='id_jurusan' id='id_jurusan' class='form-select' required>";
	$sql = $proses->tampil_data_select('*', 'jurusan', '1=1 ORDER BY id_jurusan ASC');
	foreach ($sql as $row) {
		if ($row['id_jurusan'] == $terpilih) {
			echo '<option value="' . $row['id_jurusan'] . '" selected>' . $row['nama_jurusan'] . '</option>';
		}
	}
	echo "</select> ";
}

function level($var, $terpilih)
{
	$jk = array(1 => "Admin", "Operator");
	echo "<select name='$var' id='$var' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	for ($i = 1; $i <= 2; $i++) {
		if ($jk[$i] == $terpilih) {
			echo '<option value="' . $jk[$i] . '" selected>' . str_replace('-', ' ', $jk[$i]) . '</option>';
		} else {
			echo '<option value="' . $jk[$i] . '">' . str_replace('-', ' ', $jk[$i]) . '</option>';
		}
	}
	echo "</select> ";
}

function status_banner($var, $terpilih)
{
	$jk = array(1 => "fakultas", "sipil", "elektro", "informatika", "arsitektur", "industri", "senirupadesain", "dpw", "ppid");
	echo "<select name='$var' id='$var' class='form-select' required>";
	echo '<option value="" selected>Pilih --</option>';
	for ($i = 1; $i <= 9; $i++) {
		if ($jk[$i] == $terpilih) {
			echo '<option value="' . $jk[$i] . '" selected>' . strtoupper($jk[$i]) . '</option>';
		} else {
			echo '<option value="' . $jk[$i] . '">' . strtoupper($jk[$i]) . '</option>';
		}
	}
	echo "</select> ";
}

function seo($s)
{
	$c = array(' ');
	$s = strtolower(str_replace($c, '', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	return $s;
}

function combonamabln($awal, $akhir, $var, $terpilih)
{
	$nama_bln = array(
		1 => "Januari",
		"Februari",
		"Maret",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Agustus",
		"September",
		"Oktober",
		"November",
		"Desember"
	);
	echo "<select name='$var' id='$var' class='form-control form-control-uniform' required>";
	for ($bln = $awal; $bln <= $akhir; $bln++) {
		$bulan = sprintf("%02d", $bln);
		if ($bln == $terpilih) {
			echo "<option value=$bulan selected>$nama_bln[$bln]</option>";
		} else {
			echo "<option value=$bulan>$nama_bln[$bln]</option>";
		}
	}
	echo "</select> ";
}

function ubah_tanggal($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan   = substr($tgl, 5, 2);
	$tahun   = substr($tgl, 0, 4);
	return $tanggal . '-' . $bulan . '-' . $tahun;
}

$jam_sekarang = date("H:i:s");
$tgl_sekarang = date('Y-m-d');
$tgl_sekarang2 = date('d/m/Y');
$tgl_sekarang3 = date('Ymd');
$tgl_jam = date('Y-m-d') . ' ' . date("H:i:s");

function ubah_jam($jam)
{
	$time = substr($jam, 0, 5);
	if ($jam == NULL) {
		echo '-';
	} else {
		return $time;
	}
}
function tgl_($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	return $tanggal;
}
function bln_($tgl)
{
	$bulan = substr($tgl, 5, 2);
	return $bulan;
}
function thn_($tgl)
{
	$tahun = substr($tgl, 0, 4);
	return $tahun;
}
function ubah_tgl_input($tgl)
{
	$bulan = substr($tgl, 3, 2);
	$tanggal = substr($tgl, 0, 2);
	$tahun = substr($tgl, 6, 4);
	return $tahun . '-' . $bulan . '-' . $tanggal;
}
function ubah_tgl_input2($tgl)
{
	$bulan = substr($tgl, 17, 2);
	$tanggal = substr($tgl, 14, 2);
	$tahun = substr($tgl, 20, 4);
	return $tahun . '-' . $bulan . '-' . $tanggal;
}

function ubah_tgl($tgl)
{
	$bulan = substr($tgl, 0, 2);
	$tahun = substr($tgl, 6, 4);
	return $bulan . '-' . $tahun;
}

function ubah_tgl_edit($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);
	return $tanggal . '/' . $bulan . '/' . $tahun;
}

function ubah_tgl_edit2($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);
	return $tahun . '-' . $bulan . '-' . $tanggal;
}

function tgl_indo($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function tgl_doang($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);
	return $tahun . '-' . $bulan . '-' . $tanggal;
}

function tgl_indo3($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function bln_indo($tgl)
{
	$bulan = substr($tgl, 5, 2);
	return $bulan;
}

function thn_indo($tgl)
{
	$tahun = substr($tgl, 0, 4);
	return $tahun;
}

function tgl_indo4($bln, $thn)
{
	$bulan = getBulan2($bln);
	return $bulan . ' ' . $thn;
}

function tgl_indo6($tgl)
{
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $bulan . ' ' . $tahun;
}

function tgl_indo5($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	$jam = substr($tgl, 10, 6);
	return $tanggal . ' ' . $bulan . ' ' . $tahun . ' |' . $jam;
}

function tgl_indo7($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan2(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	$jam = substr($tgl, 10, 9);
	return $tanggal . ' ' . $bulan . ' ' . $tahun . ' |' . $jam;
}

function tgl_indo8($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan2(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	$jam = substr($tgl, 10, 9);
	return $tanggal . ' ' . $bulan . ' ' . $tahun . '<small>' . $jam . '</small>';
}

function jam($jam)
{
	$jam = substr($jam, 10, 6);
	return $jam;
}

function bulan_saja($tgl)
{
	$bulan = getBulan($tgl);
	return $bulan;
}

function tahun_saja($tgl)
{
	$tahun = substr($tgl, 6, 4);
	return $tahun;
}

function bulan_saja2($tgl)
{
	$bulan = substr($tgl, 0, 2);
	return $bulan;
}

function getBulan($bln)
{
	switch ($bln) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}
function getAngka($bln)
{
	switch ($bln) {
		case 1:
			return "Satu";
			break;
		case 2:
			return "Dua";
			break;
		case 3:
			return "Tiga";
			break;
		case 4:
			return "Empat";
			break;
		case 5:
			return "Lima";
			break;
		case 6:
			return "Enam";
			break;
		case 7:
			return "Tujuh";
			break;
		case 8:
			return "Delapan";
			break;
		case 9:
			return "Sembilan";
			break;
		case 10:
			return "Sepuluh";
			break;
		case 11:
			return "Sebelas";
			break;
		case 12:
			return "Dua Belas";
			break;
	}
}
function getRomawi($bln)
{
	switch ($bln) {
		case 1:
			return "I";
			break;
		case 2:
			return "II";
			break;
		case 3:
			return "III";
			break;
		case 4:
			return "IV";
			break;
		case 5:
			return "V";
			break;
		case 6:
			return "VI";
			break;
		case 7:
			return "VII";
			break;
		case 8:
			return "VIII";
			break;
		case 9:
			return "IX";
			break;
		case 10:
			return "X";
			break;
		case 11:
			return "XI";
			break;
		case 12:
			return "XII";
			break;
	}
}

function tgl_indo2($tgl)
{
	$tanggal = substr($tgl, 8, 2);
	$bulan = getBulan2(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);
	return $tanggal . ' ' . $bulan . '<br>' . $tahun;
}

function kenaikan($awal, $akhir)
{
	$naik = (($awal - $akhir) / $akhir) * 100;
	return $naik;
}

function penurunan($akhir, $awal)
{
	$turun = (($awal - $akhir) / $awal) * 100;
	return $turun;
}

function getBulan2($bln)
{
	switch ($bln) {
		case 1:
			return "Jan";
			break;
		case 2:
			return "Feb";
			break;
		case 3:
			return "Mar";
			break;
		case 4:
			return "Apr";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Jun";
			break;
		case 7:
			return "Jul";
			break;
		case 8:
			return "Ags";
			break;
		case 9:
			return "Sep";
			break;
		case 10:
			return "Okt";
			break;
		case 11:
			return "Nov";
			break;
		case 12:
			return "Des";
			break;
	}
}

function waktu_lalu($timestamp)
{
	$selisih = time() - strtotime($timestamp);

	$detik = $selisih;
	$menit = round($selisih / 60);
	$jam = round($selisih / 3600);
	$hari = round($selisih / 86400);
	$minggu = round($selisih / 604800);
	$bulan = round($selisih / 2419200);
	$tahun = round($selisih / 29030400);

	if ($detik <= 60) {
		$waktu = $detik . ' detik yang lalu';
	} else if ($menit <= 60) {
		$waktu = $menit . ' menit yang lalu';
	} else if ($jam <= 24) {
		$waktu = $jam . ' jam yang lalu';
	} else if ($hari <= 7) {
		$waktu = $hari . ' hari yang lalu';
	} else if ($minggu <= 4) {
		$waktu = $minggu . ' minggu yang lalu';
	} else if ($bulan <= 12) {
		$waktu = $bulan . ' bulan yang lalu';
	} else {
		$waktu = $tahun . ' tahun yang lalu';
	}

	return $waktu;
}

function sisa_waktu($tanggal)
{
	$sekarang = date('Y-m-d');

	$masa_berlaku = strtotime(ubah_tanggal($tanggal)) - strtotime($sekarang);

	if ($masa_berlaku / (24 * 60 * 60) < 1) {
		@$ket = "(Habis Masa Berlaku)";
	} else if ($masa_berlaku / (24 * 60 * 60) < 32) {
		@$ket = "(Habis dalam " . $masa_berlaku / (24 * 60 * 60) . " hari lagi)";
	}
	return @$ket;
}

function jumlah_tanggal($tanggal, $jumlah)
{
	$hari = '+' . $jumlah . ' days';
	$tgl = date('Y-m-d', strtotime($hari, strtotime($tanggal)));
	return $tgl;
}
function hari_saja($tanggal)
{
	$day = date('D', strtotime($tanggal));
	$dayList = array(
		'Sun' => 'Min',
		'Mon' => 'Sen',
		'Tue' => 'Sel',
		'Wed' => 'Rab',
		'Thu' => 'Kam',
		'Fri' => 'Jum',
		'Sat' => 'Sab'
	);
	return $dayList[$day];
}

function hari_saja2($tanggal)
{
	$day = date('D', strtotime($tanggal));
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	return $dayList[$day];
}

function tgl_selanjutnya($t)
{
	$tgl = mktime(0, 0, 0, date("n"), date("j") + $t, date("Y"));
	$next = date("Y-m-d", $tgl);
	return $next;
}

function tgl_selanjutnya2($tanggal, $t)
{
	$next2 = date('Y-m-d', strtotime(+$t . 'day', strtotime($tanggal)));
	return $next2;
}

function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " Seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " Seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "minus " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil . ' Rupiah';
}

function potong_text($text)
{
	$kalimat = strtok(($text), " ");
	for ($i = 1; $i <= 30; $i++) {
		$ka = strip_tags($kalimat);
		echo $ka;
		echo (" "); // Spasi antar kalimat
		$kalimat = strtok(" "); // Potong per kalimat
	}
	echo "...";
}

function potong_text2($text)
{
	$kalimat = strtok(($text), " ");
	for ($i = 1; $i <= 15; $i++) {
		$ka = strip_tags($kalimat);
		echo $ka;
		echo (" "); // Spasi antar kalimat
		$kalimat = strtok(" "); // Potong per kalimat
	}
	echo "...";
}

function potong_judul($judul)
{
	$kalimat = strtok(($judul), " ");
	for ($i = 1; $i <= 7; $i++) {
		$ka = strip_tags($kalimat);
		echo $ka;
		echo (" "); // Spasi antar kalimat
		$kalimat = strtok(" "); // Potong per kalimat
	}
	echo "...";
}
