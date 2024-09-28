<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'add') {
    $judul_seo = seo_title($_POST['judul']);
    $data[] = array(
        'judul_seo' => $judul_seo,
        'judul'     => $_POST['judul'],
        'isi'       => $_POST['isi']
    );
    $result = $proses->tambah_data('profil', $data);
}
if ($_POST['act'] == 'edit') {
    $judul_seo = seo_title($_POST['judul']);
    $data = array(
        'judul_seo' => $judul_seo,
        'judul'     => $_POST['judul'],
        'isi'       => $_POST['isi']
    );
    $result = $proses->edit_data('profil', $data, 'id_profil', $_POST['id_profil']);
}
if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('profil', 'id_profil', $id);
}
