<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'add') {
    if (!empty($_FILES['image']['tmp_name'])) {
        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $ekstensi = $ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $form_field = "image";
        $upload_path = "../../../assets/images/banner/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 500;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '1000000', $upload_path, $width, $height);
            $data[] = array(
                'file'      => $image_name,
                'urutan'    => $_POST['urutan'],
                'ket'       => $_POST['ket'],
                'jenis'     => $_POST['jenis'],
                'publish'   => $_POST['publish']

            );
            $result = $proses->tambah_data('banner', $data);
        } else {
            exit();
        }
    } else {
        $data[] = array(
            'urutan'     => $_POST['urutan'],
            'ket'        => $_POST['ket'],
            'jenis'      => $_POST['jenis'],
            'publish'    => $_POST['publish']
        );
        $result = $proses->tambah_data('banner', $data);
    }
} else if ($_POST['act'] == 'edit') {
    if (!empty($_FILES['image']['tmp_name'])) {

        $cek = $proses->cek_fetch('banner', 'id = "' . $_POST['id'] . '"');
        if (!empty($cek['file'])) {
            unlink('../../../assets/images/banner/' . 'thumb_' . $cek['file']);
            unlink('../../../assets/images/banner/' . $cek['file']);
        }

        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $ekstensi = $ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $form_field = "image";
        $upload_path = "../../../assets/images/banner/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 500;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '1000000', $upload_path, $width, $height);
            $data = array(
                'file'      => $image_name,
                'urutan'    => $_POST['urutan'],
                'ket'       => $_POST['ket'],
                'jenis'     => $_POST['jenis'],
                'publish'   => $_POST['publish']
            );
            $result = $proses->edit_data('banner', $data, 'id', $_POST['id']);
        } else {
            exit();
        }
    } else {
        $data = array(
            'urutan'    => $_POST['urutan'],
            'ket'       => $_POST['ket'],
            'jenis'     => $_POST['jenis'],
            'publish'   => $_POST['publish']
        );
        $result = $proses->edit_data('banner', $data, 'id', $_POST['id']);
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $cek = $proses->cek_fetch('banner', 'id = "' . $_POST['del'] . '"');
    if (!empty($cek['file'])) {
        unlink('../../../assets/images/banner/' . 'thumb_' . $cek['file']);
        unlink('../../../assets/images/banner/' . $cek['file']);
    }
    $result = $proses->hapus_data('banner', 'id', $id);
} else if ($_POST['act'] == 'image') {
    $id = $_POST['del'];
    $data = array(
        'file'     => ''
    );
    $result = $proses->edit_data('banner', $data, 'id', $id);
    unlink('../../../assets/images/banner/' . 'thumb_' . $_POST['files']);
    unlink('../../../assets/images/banner/' . $_POST['files']);
}
