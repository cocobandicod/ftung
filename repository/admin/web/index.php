<?php
session_start();
if (!isset($_SESSION['nama_lengkap']))
{
	echo "<script>
	document.location='../login.html'</script>"; 
} else {
	echo "<script>
	document.location='admin.html'</script>";	
}
?>