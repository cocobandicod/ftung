<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'add') {
    $data[] = array(
        'id_jurusan'    => $_POST['id_jurusan'],
        'jurnal'        => $_POST['jurnal'],
        'link'          => $_POST['link']
    );
    $result = $proses->tambah_data('link_jurnal', $data);
} else if ($_POST['act'] == 'edit') {
    $data = array(
        'id_jurusan'    => $_POST['id_jurusan'],
        'jurnal'        => $_POST['jurnal'],
        'link'          => $_POST['link']
    );
    $result = $proses->edit_data('link_jurnal', $data, 'id_jurnal', $_POST['id_jurnal']);
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('link_jurnal', 'id_jurnal', $id);
}
