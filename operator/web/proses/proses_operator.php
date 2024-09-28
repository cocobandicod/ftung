<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');

if ($_POST['act'] == 'add') {
    $pengacak  = "NDJS3289JSKS190JISJI";
    $pass = md5($pengacak . md5($_POST['password']) . $pengacak);
    $data[] = array(
        'nama'            => $_POST['nama'],
        'email'           => $_POST['email'],
        'telepon'         => $_POST['telepon'],
        'username'        => $_POST['username'],
        'password'        => $pass,
        'level'           => $_POST['level']
    );
    $result = $proses->tambah_data('operator', $data);
} else if ($_POST['act'] == 'edit') {
    if (!empty($_POST['password'])) {
        $pengacak  = "NDJS3289JSKS190JISJI";
        $pass = md5($pengacak . md5($_POST['password']) . $pengacak);
        $data = array(
            'nama'            => $_POST['nama'],
            'email'           => $_POST['email'],
            'telepon'         => $_POST['telepon'],
            'username'        => $_POST['username'],
            'password'        => $pass,
            'level'           => $_POST['level']
        );
    } else {
        $data = array(
            'nama'            => $_POST['nama'],
            'email'           => $_POST['email'],
            'telepon'         => $_POST['telepon'],
            'username'        => $_POST['username'],
            'level'           => $_POST['level']
        );
    }
    $result = $proses->edit_data('operator', $data, 'id_operator', $_POST['id_operator']);
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $result = $proses->hapus_data('operator', 'id_operator', $id);
}
