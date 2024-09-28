<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'add') {

    $judul_seo = seo_title($_POST['judul']);
    $tanggal = $_POST['tanggal'] . ' ' . $jam_sekarang;

    if (!empty($_FILES['image']['tmp_name'])) {
        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $form_field = "image";
        $upload_path = "../../../assets/images/berita/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 1024;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '1000000', $upload_path, $width, $height);
            $data[] = array(
                'id_jurusan' => $_POST['id_jurusan'],
                'tanggal'   => $tanggal,
                'judul'     => htmlspecialchars($_POST['judul']),
                'judul_seo' => $judul_seo,
                'isi'       => $_POST['isi'],
                'file'      => $image_name,
                'dibaca'    => 0,
                'publish'   => $_POST['publish'],
                'id_operator' => $_SESSION['kode_user']
            );
            $result = $proses->tambah_data('berita', $data);
        } else {
            exit();
        }
    } else {
        $data[] = array(
            'id_jurusan' => $_POST['id_jurusan'],
            'tanggal'   => $tanggal,
            'judul'     => htmlspecialchars($_POST['judul']),
            'judul_seo' => $judul_seo,
            'isi'       => $_POST['isi'],
            'dibaca'    => 0,
            'publish'   => $_POST['publish'],
            'id_operator' => $_SESSION['kode_user']
        );
        $result = $proses->tambah_data('berita', $data);
    }
} else if ($_POST['act'] == 'edit') {

    $judul_seo = seo_title($_POST['judul']);
    $tanggal = $_POST['tanggal'] . ' ' . $jam_sekarang;

    if (!empty($_FILES['image']['tmp_name'])) {

        $cek = $proses->cek_fetch('berita', 'id = "' . $_POST['id'] . '"');
        if (!empty($cek['file'])) {
            unlink('../../../assets/images/berita/' . 'thumb_' . $cek['file']);
            unlink('../../../assets/images/berita/' . $cek['file']);
        }

        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $form_field = "image";
        $upload_path = "../../../assets/images/berita/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 1024;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '1000000', $upload_path, $width, $height);
            $data = array(
                'id_jurusan' => $_POST['id_jurusan'],
                'tanggal'   => $tanggal,
                'judul'     => htmlspecialchars($_POST['judul']),
                'judul_seo' => $judul_seo,
                'isi'       => $_POST['isi'],
                'file'      => $image_name,
                'publish'   => $_POST['publish'],
                'id_operator' => $_SESSION['kode_user']
            );
            $result = $proses->edit_data('berita', $data, 'id', $_POST['id']);
        } else {
            exit();
        }
    } else {
        $data = array(
            'id_jurusan' => $_POST['id_jurusan'],
            'tanggal'   => $tanggal,
            'judul'     => htmlspecialchars($_POST['judul']),
            'judul_seo' => $judul_seo,
            'isi'       => $_POST['isi'],
            'publish'   => $_POST['publish'],
            'id_operator' => $_SESSION['kode_user']
        );
        $result = $proses->edit_data('berita', $data, 'id', $_POST['id']);
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];

    $result = $proses->hapus_data('berita', 'id', $id);
} else if ($_POST['act'] == 'image') {
    $id = $_POST['del'];
    $data = array(
        'file'     => ''
    );
    $result = $proses->edit_data('berita', $data, 'id', $id);
    unlink('../../../assets/images/berita/' . $_POST['files']);
}
