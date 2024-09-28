<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');

if ($_POST['act'] == 'edit') {
    $data = array(
        'nama'            => $_POST['nama'],
        'email'           => $_POST['email'],
        'telepon'         => $_POST['telepon']
    );
    $result = $proses->edit_data('operator', $data, 'id_operator', $_POST['id']);
}
