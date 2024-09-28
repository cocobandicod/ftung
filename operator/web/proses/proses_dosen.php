<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'add') {

    $judul_seo = seo_title($_POST['judul']);
    $data[] = array(
        'id_jurusan'        => $_POST['id_jurusan'],
        'nidn'              => $_POST['nidn'],
        'nama'              => $_POST['nama'],
        'jabatan_akademik'  => $_POST['jabatan_akademik'],
        'gelar_akademik'    => $_POST['gelar_akademik'],
        'id_scholar'        => $_POST['id_scholar'],
        'id_sinta'          => $_POST['id_sinta']
    );
    $result = $proses->tambah_data('data_dosen', $data);
} else if ($_POST['act'] == 'edit') {

    $judul_seo = seo_title($_POST['judul']);
    $data = array(
        'id_jurusan'        => $_POST['id_jurusan'],
        'nidn'              => $_POST['nidn'],
        'nama'              => $_POST['nama'],
        'jabatan_akademik'  => $_POST['jabatan_akademik'],
        'gelar_akademik'    => $_POST['gelar_akademik'],
        'id_scholar'        => $_POST['id_scholar'],
        'id_sinta'          => $_POST['id_sinta']
    );
    $result = $proses->edit_data('data_dosen', $data, 'id_dosen', $_POST['id']);
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('data_dosen', 'id_dosen', $id);
}
