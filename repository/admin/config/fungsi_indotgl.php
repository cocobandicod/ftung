<?php
	date_default_timezone_set('Asia/Makassar'); // PHP 6 mengharuskan penyebutan timezone.
	
	$tgl_sekarang = date('Y-m-d');
	$tgl_jam = date('Y-m-d').' '.date("H:i:s");

	function ubah_tgl_input($tgl){
			$bulan = substr($tgl,0,2);
			$tanggal = substr($tgl,3,2);
			$tahun = substr($tgl,6,4);
			return $tahun.'-'.$bulan.'-'.$tanggal;		 
	}

	function ubah_tgl_edit($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $bulan.'/'.$tanggal.'/'.$tahun;	 
	}
	
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function tgl_doang($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tahun.'-'.$bulan.'-'.$tanggal;		 
	}

	function tgl_indo3($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}

	function bln_indo($tgl){
			$bulan = substr($tgl,5,2);
			return $bulan;		 
	}

	function tgl_indo4($bln,$thn){
			$bulan = getBulan2($bln);
			return $bulan.' '.$thn;	 
	}
	
	function tgl_indo6($tgl){
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $bulan.' '.$tahun;	 
	}
	
	function tgl_indo5($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,10,6);
			return $tanggal.' '.$bulan.' '.$tahun. ' |' .$jam;		 
	}
	function bulan_saja($tgl){
			$bulan = getBulan($tgl);
			return $bulan;		 
	}
	function getBulan($bln){
				switch ($bln){
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

	function tgl_indo2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan2(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan2($bln){
				switch ($bln){
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
    $selisih = time() - strtotime($timestamp) ;
 
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
 
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    
    return $waktu;
}
?>