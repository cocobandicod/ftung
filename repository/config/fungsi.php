<?php
function stopword($teks){
	 $q = explode(' ',$teks);
	 for($i=0;$i<count($q);$i++){
	 $sql = mysqli_query($con,"SELECT * FROM stopword WHERE stopword = '$q[$i]'");
	 $jum = mysqli_num_rows($sql);
		 if($jum > 0 ){// stopword removal
			$y[$i] = '';
		 }else{
			$y[$i] = $q[$i];
		 };
	 }
	 $q = implode(' ',$y);
	 return $q;
} 

function hapus_tanda_baca($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, ' ', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

function block($teks,$keyword){
	$keyword=hapus_tanda_baca($keyword);	// lakukan fungsi prosesAwal()
	$pisahKeyWord=explode(" ",$keyword);	// memisahkan keyword berdasarkan pemisah spasi, menjadi array $pisahKeyword
	$newTeks="";
	$pisahTeks=explode(" ",$teks);	// memisahkan teks berdasarkan pemisah spasi, menjadi array $pisahTeks
	for($j=0; $j<count($pisahTeks); $j++){	// lakukan perulangan 
		if(in_array(strtolower($pisahTeks[$j]),$pisahKeyWord)){
			$newTeks.=' <span style="color: red;">'.$pisahTeks[$j].'</span>';
		}else{
			$newTeks.=' '.$pisahTeks[$j];
		}
	}
	return $newTeks;
}

function spasiTunggal($teks){
	$teks=str_replace("  "," ",$teks);	// mengganti spasi ganda menjadi spasi tunggal
	$pisahTeks=explode("  ",$teks);	// memisahkan string teks berdasarkan pemisah spasi ganda, menjadi array $pisahTeks
	if(count($pisahTeks)>=2){	// jika jumlah dalam array $pisahTeks lebih atau sama dengan 2 (masih ada yang spasi ganda), maka lakukan fungsi spasiTunggal() lagi
		return spasiTunggal($teks);
	}else{	// jika tidak kembalikan nilai $teks dengan fungsi trim(menghilangkan spasi pada awal dan akhir kata)
		//return trim($teks);
		return trim($teks);
	}
}

// Fungsi pre proses(menghilangkan tanda baca dan spasi ganda)
function prosesAwal($teks){
	// Bersihkan tanda baca dengan cara ganti dengan space
	$teks=str_replace("'"," ",$teks);
	$teks=str_replace("-"," ",$teks);
	$teks=str_replace(")"," ",$teks);
	$teks=str_replace("("," ",$teks);
	$teks=str_replace("\""," ",$teks);
	$teks=str_replace("/"," ",$teks);
	$teks=str_replace("="," ",$teks);
	$teks=str_replace("."," ",$teks);
	$teks=str_replace(","," ",$teks);
	$teks=str_replace(":"," ",$teks);
	$teks=str_replace(";"," ",$teks);
	$teks=str_replace("!"," ",$teks);
	$teks=str_replace("?"," ",$teks);
	$teks=str_replace("\n"," ",$teks);
	$teks=str_replace("<br/>"," ",$teks);
	$teks=spasiTunggal($teks);	// lakukan fungsi spasiTunggal()

	$teks=strtolower($teks);	// ubah ke huruf kecil semua
	return $teks;
}

// Fungsi membuat indeks kata (tokenisasi)
function buatIndexKata($id_artikel){
	$sqlArtikel=mysqli_query($con,"SELECT * FROM artikel WHERE id_artikel='$id_artikel'");
	while($ambilArtikel=mysqli_fetch_array($sqlArtikel)){
		// Proses Tokenizing Judul Artikel
		$judul=prosesAwal($ambilArtikel['judul']);	// lakukan fungsi prosesAwal()
		$pilahKata=explode(" ",$judul);
		for($i=0; $i<count($pilahKata); $i++){
			if(!empty($pilahKata[$i])){
				$cekKata=mysqli_query($con,"SELECT * FROM kata WHERE id_artikel='$ambilArtikel[id_artikel]' AND kata='$pilahKata[$i]'");
				if(mysqli_num_rows($cekKata)>0){	// cek jika kata sudah ada dalam tabel kata(kata sudah pernah ditemukan/dipakai) lebih dari 0
					$ambilCekKata=mysqli_fetch_array($cekKata);
					$count=$ambilCekKata['count']+1;	// jumlah banyak kali muncul ditambah 1
					mysqli_query($con,"UPDATE kata SET count='$count' WHERE id_artikel='$ambilCekKata[id_artikel]' AND kata='$ambilCekKata[kata]'");
				}else{
					mysqli_query($con,"INSERT INTO kata VALUES('','$ambilArtikel[id_artikel]','$pilahKata[$i]',1)");
				}
			}
		}		

	}
}

// Fungsi membuat indeks kata (tokenisasi)
function buatIndexAbstrak($id_artikel){
	$sqlAbstrak=mysqli_query($con,"SELECT * FROM artikel WHERE id_artikel='$id_artikel'");
	while($ambilAbstrak=mysqli_fetch_array($sqlAbstrak)){
		// Proses Tokenizing Abstrak Artikel
		$abstrak=prosesAwal($ambilAbstrak['abstrak']);	// lakukan fungsi prosesAwal()
		$pilahAbstrak=explode(" ",$abstrak);
		for($j=0; $j<count($pilahAbstrak); $j++){
			if(!empty($pilahAbstrak[$j])){
				$cekAbstrak=mysqli_query($con,"SELECT * FROM kata WHERE id_artikel='$ambilAbstrak[id_artikel]' AND kata='$pilahAbstrak[$j]'");
				if(mysqli_num_rows($cekAbstrak)>0){	// cek jika kata sudah ada dalam tabel kata(kata sudah pernah ditemukan/dipakai) lebih dari 0
					$ambilCekAbstrak=mysqli_fetch_array($cekAbstrak);
					$count=$ambilCekAbstrak['count']+1;	// jumlah banyak kali muncul ditambah 1
					mysqli_query($con,"UPDATE kata SET count='$count' WHERE id_artikel='$ambilCekAbstrak[id_artikel]' AND kata='$ambilCekAbstrak[kata]'");
				}else{
					mysqli_query($con,"INSERT INTO kata VALUES('','$ambilAbstrak[id_artikel]','$pilahAbstrak[$j]',1)");
				}
			}
		}		

	}
}

function cari($input){
//$input = 'sipa';
$sql = mysqli_query($con,"SELECT * FROM kata");
$words  = array();
while($s = mysqli_fetch_array($sql)){
	$words[] = $s[kata];
}
// array of words to check against
/*
$words  = array('apple','pineapple','banana','orange',
                'radish','carrot','pea','bean','potato');
*/
// no shortest distance found, yet
$shortest = -1;

// loop through words to find the closest
foreach ($words as $word) {

    // calculate the distance between the input word,
    // and the current word
    $lev = levenshtein($input, $word);

    // check for an exact match
    if ($lev == 0) {

        // closest word is this one (exact match)
        $closest = $word;
        $shortest = 0;

        // break out of the loop; we've found an exact match
        break;
    }

    // if this distance is less than the next found shortest
    // distance, OR if a next shortest word has not yet been found
    if ($lev <= $shortest || $shortest < 0) {
        // set the closest match, and shortest distance
        $closest  = $word;
        $shortest = $lev;
    }
}


	//if ($shortest == 0) {
		//echo $closest." ";
	//} else {
		
		//echo $closest."+";
		
		//echo "<a href=''>".str_replace("+"," ",$a)."</a>";
		return $closest."";
	//}

}

function perbaiki_kata($kalimat){
	$hitung = count(explode(" ",$kalimat)); //menghitung jumlah kata
	$pecah = explode(" ",$kalimat); // menghitung jumlah kata yang dicari
	
	$data = array();
	//echo "Showing results for : ";
	for($a=0;$a<=$hitung-1;$a++)
	{
	  $carikecil = strtolower($pecah[$a]);
	  $data[] = cari($carikecil);
	  $tess = implode(" ",$data);
	}
	$ganti = str_replace(" ","+",$tess);
	
	if($tess == $kalimat){
	  
	} else {
		if($tess != 1){
		echo "<div style='font-size:16px; float:right; margin-bottom:10px;'><b>";	
		echo "Mungkin Maksud Pencarian Anda : <a href='?keyword=$ganti'><i><u>".$tess."</u></i></a>";
		echo "</b></div><br /><br />";
		} else { }
	}
}
?>