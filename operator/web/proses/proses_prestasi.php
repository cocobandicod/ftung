<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'edit') {

    $data = array(
        'isi_halaman'   => $_POST['isi_halaman']
    );
    $result = $proses->edit_data('prestasi', $data, 'id_jurusan', $_POST['id_jurusan']);
}
