<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'edit') {
    $data = array(
        'isi'       => $_POST['isi']
    );
    $result = $proses->edit_data('profil_jurusan', $data, 'id_profil', $_POST['id_profil']);
}
