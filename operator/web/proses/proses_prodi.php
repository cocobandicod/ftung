<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'edit') {

    $data = array(
        'id_jurusan'    => $_POST['id_jurusan'],
        'prodi'         => $_POST['prodi'],
        'seo_prodi'     => $_POST['seo_prodi'],
        'isi_halaman'   => $_POST['isi_halaman'],
        'link'          => $_POST['link']
    );
    $result = $proses->edit_data('prodi', $data, 'id_prodi', $_POST['id_prodi']);
}
