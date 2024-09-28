<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');

if ($_POST['act'] == 'add') {
    $judul_seo = seo_title($_POST['judul']);
    $data[] = array(
        'urutan'    => $_POST['urutan'],
        'tanggal'   => $tgl_jam,
        'judul'     => $_POST['judul'],
        'judul_seo' => $judul_seo,
        'deskripsi' => $_POST['deskripsi'],
        'isi'       => $_POST['isi'],
        'posisi'    => 'Beranda',
        'publish'   => $_POST['publish'],
        'id_operator' => $_SESSION['kode_user']
    );
    $result = $proses->tambah_data('informasi', $data);
} else if ($_POST['act'] == 'edit') {
    $judul_seo = seo_title($_POST['judul']);
    $data = array(
        'urutan'    => $_POST['urutan'],
        'tanggal'   => $tgl_jam,
        'judul'     => $_POST['judul'],
        'judul_seo' => $judul_seo,
        'deskripsi' => $_POST['deskripsi'],
        'isi'       => $_POST['isi'],
        'publish'   => $_POST['publish'],
        'id_operator' => $_SESSION['kode_user']
    );
    $result = $proses->edit_data('informasi', $data, 'id', $_POST['id']);
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('informasi', 'id', $id);
}
