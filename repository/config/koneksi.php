<?php
date_default_timezone_set('Asia/Makassar'); // PHP 6 mengharuskan penyebutan timezone.
$con = @mysqli_connect('localhost', 'ft_repo', 'g0r0nt4l012345', 'ft_repository');
if (!$con) {
    echo "Error Koneksi: " . mysqli_connect_error();
	exit();
}
$url = "https://ft.ung.ac.id/repository/";
?>