<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/cek_ajax.php');

$tokenAkses = token();

$user = anti_injection($_POST['username']);
$pass = anti_injection($_POST['password']);

$pengacak  = "NDJS3289JSKS190JISJI";

$password = (md5($pengacak . md5($pass) . $pengacak));

$result = $proses->proses_login_admin($user, $password);
if ($result == 'gagal') {
    echo $result;
} else {
    $data = array(
        'token'        => $tokenAkses,
        'last_login'   => $tgl_jam
    );
    $proses->edit_data('operator', $data, 'id_operator', $result['id_operator']);
    $_SESSION['token'] = $tokenAkses;
    $_SESSION['kode_user'] = $result['id_operator'];
    $_SESSION['id_jurusan'] = $result['id_jurusan'];
    $_SESSION['nama'] = $result['nama'];
    $_SESSION['level'] = $result['level'];
    echo "beranda";
}
