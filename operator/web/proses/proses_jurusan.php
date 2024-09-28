<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'edit') {

    $data = array(
        'nama_jurusan'  => $_POST['nama_jurusan'],
        'seo'           => $_POST['seo'],
        'link'          => $_POST['link'],
        'doctoral'      => $_POST['doctoral'],
        'magister'      => $_POST['magister'],
        'mahasiswa'     => $_POST['mahasiswa'],
        'alumni'        => $_POST['alumni']
    );
    $result = $proses->edit_data('jurusan', $data, 'id_jurusan', $_POST['id_jurusan']);
}
