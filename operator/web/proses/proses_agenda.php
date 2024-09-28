<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');

if ($_POST['act'] == 'add') {
    $data[] = array(
        'nama'      => $_POST['nama'],
        'tanggal'   => $_POST['tanggal'],
        'lokasi'    => $_POST['lokasi']
    );
    $result = $proses->tambah_data('agenda', $data);
} else if ($_POST['act'] == 'edit') {
    $data = array(
        'nama'      => $_POST['nama'],
        'tanggal'   => $_POST['tanggal'],
        'lokasi'    => $_POST['lokasi']
    );
    $result = $proses->edit_data('agenda', $data, 'id_agenda', $_POST['id_agenda']);
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('agenda', 'id_agenda', $id);
}
