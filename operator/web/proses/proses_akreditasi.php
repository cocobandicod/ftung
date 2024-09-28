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
                'id_jurusan'    => strip_tags($_POST['id_jurusan']),
                'prodi'         => strip_tags($_POST['prodi']),
                'peringkat'     => strip_tags($_POST['peringkat']),
                'no_sk'         => strip_tags($_POST['no_sk']),
                'file'          => $name1
            );
            $result = $proses->tambah_data('akreditasi', $data); // SIMPAN KE DATABASE
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
            $file = $proses->cek_fetch('akreditasi', 'id_akreditasi = "' . $_POST['id'] . '"');
            if (!empty($file['file'])) {
                unlink('../../../berkas/' . $file['file']);
            }
            define("UPLOAD_DIR", "../../../berkas/"); // LOKASI FILE
            $myFile1 = $_FILES['fupload'];
            $name1 = uniqid() . "." . $ext1;
            move_uploaded_file($myFile1['tmp_name'], UPLOAD_DIR . $name1);
            $data = array(
                'id_jurusan'    => strip_tags($_POST['id_jurusan']),
                'prodi'         => strip_tags($_POST['prodi']),
                'peringkat'     => strip_tags($_POST['peringkat']),
                'no_sk'         => strip_tags($_POST['no_sk']),
                'file'          => $name1
            );
            $result = $proses->edit_data('akreditasi', $data, 'id_akreditasi', $_POST['id']); // SIMPAN KE DATABASE
        }
    } else {
        $data = array(
            'id_jurusan'    => strip_tags($_POST['id_jurusan']),
            'prodi'         => strip_tags($_POST['prodi']),
            'peringkat'     => strip_tags($_POST['peringkat']),
            'no_sk'         => strip_tags($_POST['no_sk'])
        );
        $result = $proses->edit_data('akreditasi', $data, 'id_akreditasi', $_POST['id']); // SIMPAN KE DATABASE
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $file = $proses->cek_fetch('akreditasi', 'id_akreditasi = "' . $id . '"');
    if (!empty($file['file'])) {
        unlink('../../../berkas/' . $file['file']);
    }
    $result = $proses->hapus_data('akreditasi', 'id_akreditasi', $id);
    exit();
}
