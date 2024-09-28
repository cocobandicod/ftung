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
        $ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $form_field = "image";
        $upload_path = "../../../assets/img/galeri/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 768;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '1000000', $upload_path, $width, $height);
            $data[] = array(
                'ket'     => $_POST['ket'],
                'file'      => $image_name
            );
            $result = $proses->tambah_data('galeri', $data);
        } else {
            exit();
        }
    } else {
        $data[] = array(
            'ket'     => $_POST['ket']
        );
        $result = $proses->tambah_data('galeri', $data);
    }
} else if ($_POST['act'] == 'edit') {
    if (!empty($_FILES['image']['tmp_name'])) {

        $cek = $proses->cek_fetch('galeri', 'id = "' . $_POST['id'] . '"');
        if (!empty($cek['file'])) {
            unlink('../../../assets/img/galeri/' . 'thumb_' . $cek['file']);
            unlink('../../../assets/img/galeri/' . $cek['file']);
        }

        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $ekstensi = $ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $form_field = "image";
        $upload_path = "../../../assets/img/galeri/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 768;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '1000000', $upload_path, $width, $height);
            $data = array(
                'ket'     => $_POST['ket'],
                'file'    => $image_name
            );
            $result = $proses->edit_data('galeri', $data, 'id', $_POST['id']);
        } else {
            exit();
        }
    } else {
        $data = array(
            'ket'     => $_POST['ket']
        );
        $result = $proses->edit_data('galeri', $data, 'id', $_POST['id']);
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $cek = $proses->cek_fetch('galeri', 'id = "' . $_POST['del'] . '"');
    if (!empty($cek['file'])) {
        unlink('../../../assets/img/galeri/' . 'thumb_' . $cek['file']);
        unlink('../../../assets/img/galeri/' . $cek['file']);
    }
    $result = $proses->hapus_data('galeri', 'id', $id);
} else if ($_POST['act'] == 'image') {
    $id = $_POST['del'];
    $data = array(
        'file'     => ''
    );
    $result = $proses->edit_data('galeri', $data, 'id', $id);
    unlink('../../../assets/img/galeri/' . $_POST['files']);
    unlink('../../../assets/img/galeri/' . 'thumb_' . $_POST['files']);
}
