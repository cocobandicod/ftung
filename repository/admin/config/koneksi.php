<?php

date_default_timezone_set('Asia/Makassar'); // PHP 6 mengharuskan penyebutan timezone.
mysql_connect("localhost", "root", "") or die("Gagal Koneksi");
mysql_select_db("akreditasi") or die ("Database Tidak Bisa Dibuka");
$url = "http://localhost/SI-AKREDITASI/";
?>