<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');

if ($_POST['act'] == 'add') {
    $data[] = array(
        'text'    => anti_injection($_POST['text'])
    );
    $result = $proses->tambah_data('running_text', $data);
} else if ($_POST['act'] == 'edit') {
    $data = array(
        'text'    => anti_injection($_POST['text'])
    );
    $result = $proses->edit_data('running_text', $data, 'id', $_POST['id']);
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('running_text', 'id', $id);
}
