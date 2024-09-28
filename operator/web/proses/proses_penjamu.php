<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');

if (@$_POST['act'] == 'add') {
    echo 'berhasil';
    if (!empty($_FILES['fupload']['tmp_name'])) {
        $path1 = $_FILES['fupload']['name'];
        $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
        //$mime = $_FILES['fupload']['type'];
        $ekstensi_file  = array('pdf');
        $ekstensi_ok1    = in_array($ext1, $ekstensi_file);
        $kode = random_char();
        if (!($ekstensi_ok1)) {
            echo 'gagal';
        } else {
            define("UPLOAD_DIR", "../../../berkas/"); // LOKASI FILE
            $myFile1 = $_FILES['fupload'];
            $name1 = uniqid() . "." . $ext1;
            move_uploaded_file($myFile1['tmp_name'], UPLOAD_DIR . $name1);
            $data[] = array(
                'menu'              => strip_tags($_POST['menu']),
                'kode'              => strip_tags($kode),
                'judul'             => strip_tags($_POST['judul']),
                'nama_file'         => $name1,
                'tanggal'           => $tgl_sekarang,
                'hits'              => '0'
            );
            $result = $proses->tambah_data('penjamu', $data); // SIMPAN KE DATABASE
        }
    }
} else if (@$_POST['act'] == 'edit') {
    if (!empty($_FILES['fupload']['tmp_name'])) {
        $path1 = $_FILES['fupload']['name'];
        $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
        $ekstensi_file  = array('pdf');
        $ekstensi_ok1    = in_array($ext1, $ekstensi_file);
        if (!($ekstensi_ok1)) {
            echo 'gagal';
        } else {
            $file = $proses->cek_fetch('penjamu', 'id_mutu = "' . $_POST['id'] . '"');
            if (!empty($file['nama_file'])) {
                unlink('../../../berkas/' . $file['nama_file']);
            }
            define("UPLOAD_DIR", "../../../berkas/"); // LOKASI FILE
            $myFile1 = $_FILES['fupload'];
            $name1 = uniqid() . "." . $ext1;
            move_uploaded_file($myFile1['tmp_name'], UPLOAD_DIR . $name1);
            $data = array(
                'menu'              => strip_tags($_POST['menu']),
                'judul'             => strip_tags($_POST['judul']),
                'nama_file'         => $name1,
                'tanggal'           => $tgl_sekarang
            );
            $result = $proses->edit_data('penjamu', $data, 'id_mutu', $_POST['id']); // SIMPAN KE DATABASE
        }
    } else {
        $data = array(
            'menu'              => strip_tags($_POST['menu']),
            'judul'             => strip_tags($_POST['judul']),
            'tanggal'           => $tgl_sekarang
        );
        $result = $proses->edit_data('penjamu', $data, 'id_mutu', $_POST['id']); // SIMPAN KE DATABASE
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $file = $proses->cek_fetch('penjamu', 'id_mutu = "' . $id . '"');
    if (!empty($file['nama_file'])) {
        unlink('../../../berkas/' . $file['nama_file']);
    }
    $result = $proses->hapus_data('penjamu', 'id_mutu', $id);
    exit();
}
