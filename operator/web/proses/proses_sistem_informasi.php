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
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        $form_field = "image";
        $upload_path = "../../../assets/img/sistem_informasi/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 75;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '500000', $upload_path, $width, $height);
            $data[] = array(
                'judul'     => strip_tags($_POST['judul']),
                'link'      => $_POST['link'],
                'file'      => $image_name
            );
            $result = $proses->tambah_data('sistem_informasi', $data);
        } else {
            exit();
        }
    } else {
        $data[] = array(
            'judul'     => strip_tags($_POST['judul']),
            'link'      => $_POST['link']
        );
        $result = $proses->tambah_data('sistem_informasi', $data);
    }
} else if ($_POST['act'] == 'edit') {
    if (!empty($_FILES['image']['tmp_name'])) {

        $cek = $proses->cek_fetch('sistem_informasi', 'id_link = "' . $_POST['id_link'] . '"');
        if (!empty($cek['file'])) {
            unlink('../../../assets/img/sistem_informasi/' . 'thumb_' . $cek['file']);
            unlink('../../../assets/img/sistem_informasi/' . $cek['file']);
        }

        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        $form_field = "image";
        $upload_path = "../../../assets/img/sistem_informasi/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 75;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '500000', $upload_path, $width, $height);
            $data = array(
                'judul'     => strip_tags($_POST['judul']),
                'link'      => $_POST['link'],
                'file'      => $image_name
            );
            $result = $proses->edit_data('sistem_informasi', $data, 'id_link', $_POST['id_link']);
        } else {
            exit();
        }
    } else {
        $data = array(
            'judul'     => strip_tags($_POST['judul']),
            'link'      => $_POST['link']
        );
        $result = $proses->edit_data('sistem_informasi', $data, 'id_link', $_POST['id_link']);
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $cek = $proses->cek_fetch('sistem_informasi', 'id_link = "' . $_POST['del'] . '"');
    if (!empty($cek['file'])) {
        unlink('../../../assets/img/sistem_informasi/' . 'thumb_' . $cek['file']);
        unlink('../../../assets/img/sistem_informasi/' . $cek['file']);
    }
    $result = $proses->hapus_data('sistem_informasi', 'id_link', $id);
} else if ($_POST['act'] == 'image') {
    $id = $_POST['del'];
    $data = array(
        'file'     => ''
    );
    $result = $proses->edit_data('sistem_informasi', $data, 'id_link', $id);
    unlink('../../../assets/img/sistem_informasi/' . $_POST['files']);
    unlink('../../../assets/img/sistem_informasi/' . 'thumb_' . $_POST['files']);
}
