<?php
// class paging untuk halaman administrator
class paging
{

	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas)
	{

		if (empty($_GET['hal'])) {
			$posisi = 0;
			$_GET['hal'] = 1;
		} else {
			$posisi = ($_GET['hal'] - 1) * $batas;
		}
		return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas)
	{
		$jmlhalaman = ceil($jmldata / $batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 (untuk barang_pokok)
	function navHalaman($halaman_aktif, $jmlhalaman, $menu)
	{
		$link_halaman = "";

		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if ($halaman_aktif > 1) {
			$prev = $halaman_aktif - 1;
			$link_halaman .= "<li><a href=$menu/hal/1><i class='fas fa-chevron-left'></i><i class='fas fa-chevron-left'></i></a></li>
                    <li><a href=$menu/hal/$prev><i class='fas fa-chevron-left'></i></a></li>";
		} else {
			$link_halaman .= ""; //"<li> First | Prev | </li>";
		}

		// Link halaman 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " " : " ");
		for ($i = $halaman_aktif - 2; $i < $halaman_aktif; $i++) {
			if ($i < 1)
				continue;
			$angka .= "<li><a href=$menu/hal/$i>$i</a></li>";
		}
		$angka .= "<li ><a class='active'>$halaman_aktif</a></li>";

		for ($i = $halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++) {
			if ($i > $jmlhalaman)
				break;
			$angka .= "<li><a href=$menu/hal/$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif + 2 < $jmlhalaman ? "<li><a href=$menu/hal/$jmlhalaman >$jmlhalaman</a></li>" : " ");

		$link_halaman .= "$angka";

		// Link ke halaman berikutnya (Next) dan terakhir (Last) 
		if ($halaman_aktif < $jmlhalaman) {
			$next = $halaman_aktif + 1;
			$link_halaman .= " <li><a href=$menu/hal/$next><i class='fas fa-chevron-right'></i></a></li>
                     <li><a href=$menu/hal/$jmlhalaman ><i class='fas fa-chevron-right'></i><i class='fas fa-chevron-right'></i></a></li> ";
		} else {
			$link_halaman .= ""; //" Next | Last";
		}
		return $link_halaman;
	}
}
