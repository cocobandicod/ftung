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
        $upload_path = "../../../assets/images/dosen/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 400;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            echo 'berhasil';
            uploadImage($_FILES['image'], $image_name, '500000', $upload_path, $width, $height);
            $data[] = array(
                'id_jurusan' => $_POST['id_jurusan'],
                'nama'       => $_POST['nama'],
                'jabatan'    => $_POST['jabatan'],
                'gambar'     => $image_name
            );
            $result = $proses->tambah_data('struktur_organisasi', $data);
        }
    }
    /*
    if (!empty($_FILES['image']['tmp_name'])) {
        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        $form_field = "image";
        $upload_path = "../../../assets/img/sertifikat/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 400;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '500000', $upload_path, $width, $height);
            $data[] = array(
                'ket'     => $_POST['ket'],
                'file'    => $image_name
            );
            $result = $proses->tambah_data('sertifikat', $data);
        } else {
            exit();
        }
    } else {
        $data[] = array(
            'ket'     => $_POST['ket']
        );
        $result = $proses->tambah_data('sertifikat', $data);
    }
*/
} else if ($_POST['act'] == 'edit') {
    if (!empty($_FILES['image']['tmp_name'])) {

        $cek = $proses->cek_fetch('struktur_organisasi', 'id_struktur = "' . $_POST['id'] . '"');
        if (!empty($cek['gambar'])) {
            unlink('../../../assets/images/dosen/' . 'thumb_' . $cek['gambar']);
            unlink('../../../assets/images/dosen/' . $cek['gambar']);
        }

        $extensionList = array("jpeg", "jpg", "png");

        $fileName = $_FILES['image']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        $form_field = "image";
        $upload_path = "../../../assets/images/dosen/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 400;
        $height = ($width / $src_width) * $src_height;

        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image'], $image_name, '500000', $upload_path, $width, $height);
            $data = array(
                'id_jurusan' => $_POST['id_jurusan'],
                'nama'       => $_POST['nama'],
                'jabatan'    => $_POST['jabatan'],
                'gambar'     => $image_name
            );
            $result = $proses->edit_data('struktur_organisasi', $data, 'id_struktur', $_POST['id']);
        } else {
            exit();
        }
    } else {
        $data = array(
            'id_jurusan' => $_POST['id_jurusan'],
            'nama'       => $_POST['nama'],
            'jabatan'    => $_POST['jabatan']
        );
        $result = $proses->edit_data('struktur_organisasi', $data, 'id_struktur', $_POST['id']);
    }
} else if ($_POST['act'] == 'del') {
    $id = $_POST['del'];
    $cek = $proses->cek_fetch('struktur_organisasi', 'id_struktur = "' . $_POST['del'] . '"');
    if (!empty($cek['gambar'])) {
        unlink('../../../assets/images/dosen/' . 'thumb_' . $cek['gambar']);
        unlink('../../../assets/images/dosen/' . $cek['gambar']);
    }
    $result = $proses->hapus_data('struktur_organisasi', 'id_struktur', $id);
} else if ($_POST['act'] == 'image') {
    $id = $_POST['del'];
    $data = array(
        'gambar'     => ''
    );
    $result = $proses->edit_data('struktur_organisasi', $data, 'id_struktur', $id);
    unlink('../../../assets/images/dosen/' . 'thumb_' . $_POST['gambar']);
    unlink('../../../assets/images/dosen/' . $_POST['gambar']);
}
