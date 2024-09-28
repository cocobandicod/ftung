<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');
require_once('../../../config/fungsi_indotgl.php');
require_once('../../../config/image.php');

if ($_POST['act'] == 'edit') {
    $data = array(
        'title'             => $_POST['title'],
        'keywords'          => $_POST['keywords'],
        'deskripsi'         => $_POST['deskripsi'],
        'alamat'            => $_POST['alamat'],
        'email'             => $_POST['email'],
        'telepon'           => $_POST['telepon'],
        'program_studi'     => $_POST['program_studi'],
        'mahasiswa'         => $_POST['mahasiswa'],
        'lulusan'           => $_POST['lulusan'],
        'tenaga_pengajar'   => $_POST['tenaga_pengajar'],
        'facebook'          => $_POST['facebook'],
        'twitter'           => $_POST['twitter'],
        'instagram'         => $_POST['instagram'],
        'youtube'           => $_POST['youtube'],
        'profil_youtube'    => $_POST['profil_youtube'],
        'maps'              => $_POST['maps']
    );
    $result = $proses->edit_data('pengaturan', $data, 'id', $_POST['id']);
}

if ($_POST['act'] == 'upload1') {
    if (!empty($_FILES['image1']['tmp_name'])) {
        $cek = $proses->cek_fetch('pengaturan', 'id = 1');
        if (!empty($cek['logo'])) {
            unlink('../../../assets/images/logo/' . 'thumb_' . $cek['logo']);
            unlink('../../../assets/images/logo/' . $cek['logo']);
        }

        $extensionList = array("jpeg", "jpg");

        $fileName = $_FILES['image1']['name'];
        $pecah = explode(".", $fileName);
        $ekstensi = $pecah[1];

        $form_field = "image";
        $upload_path = "../../../assets/images/logo/";

        $image_name = uniqid() . '.' . $ekstensi;

        $tmp_file = $_FILES['image1']['tmp_name'];

        $imageSize = getimagesize($tmp_file);
        $src_width = $imageSize[0];
        $src_height = $imageSize[1];

        $width = 50;
        $height = ($width / $src_width) * $src_height;
        if (in_array($ekstensi, $extensionList)) {
            uploadImage($_FILES['image1'], $image_name, '1000000', $upload_path, $width, $height);
            $data = array(
                'logo'    => $image_name
            );
            $result = $proses->edit_data('pengaturan', $data, 'id', 1);
        } else {
            exit();
        }
    } else {
        exit();
    }
}

if ($_POST['act'] == 'upload2') {
    if (!empty($_FILES['image2']['tmp_name'])) {
        if (!empty($_FILES['image2']['tmp_name'])) {
            $cek = $proses->cek_fetch('pengaturan', 'id = 1');
            if (!empty($cek['profil'])) {
                unlink('../../../assets/images/bg/' . 'thumb_' . $cek['profil']);
                unlink('../../../assets/images/bg/' . $cek['profil']);
            }

            $extensionList = array("jpeg", "jpg", "png");

            $fileName = $_FILES['image2']['name'];
            $pecah = explode(".", $fileName);
            $ekstensi = $pecah[1];

            $form_field = "image";
            $upload_path = "../../../assets/images/bg/";

            $image_name = uniqid() . '.' . $ekstensi;

            $tmp_file = $_FILES['image2']['tmp_name'];

            $imageSize = getimagesize($tmp_file);
            $src_width = $imageSize[0];
            $src_height = $imageSize[1];

            $width = 50;
            $height = ($width / $src_width) * $src_height;
            if (in_array($ekstensi, $extensionList)) {
                uploadImage($_FILES['image2'], $image_name, '1000000', $upload_path, $width, $height);
                $data = array(
                    'profil'    => $image_name
                );
                $result = $proses->edit_data('pengaturan', $data, 'id', 1);
            } else {
                exit();
            }
        } else {
            exit();
        }
    }
}

if ($_POST['act'] == 'upload3') {
    if (!empty($_FILES['image3']['tmp_name'])) {
        if (!empty($_FILES['image3']['tmp_name'])) {
            $cek = $proses->cek_fetch('pengaturan', 'id = 1');
            if (!empty($cek['popup'])) {
                unlink('../../../assets/images/bg/' . 'thumb_' . $cek['popup']);
                unlink('../../../assets/images/bg/' . $cek['popup']);
            }

            $extensionList = array("jpeg", "jpg", "png");

            $fileName = $_FILES['image3']['name'];
            $pecah = explode(".", $fileName);
            $ekstensi = $pecah[1];

            $form_field = "image";
            $upload_path = "../../../assets/images/bg/";

            $image_name = uniqid() . '.' . $ekstensi;

            $tmp_file = $_FILES['image3']['tmp_name'];

            $imageSize = getimagesize($tmp_file);
            $src_width = $imageSize[0];
            $src_height = $imageSize[1];

            $width = 50;
            $height = ($width / $src_width) * $src_height;
            if (in_array($ekstensi, $extensionList)) {
                uploadImage($_FILES['image3'], $image_name, '1000000', $upload_path, $width, $height);
                $data = array(
                    'popup'    => $image_name
                );
                $result = $proses->edit_data('pengaturan', $data, 'id', 1);
            } else {
                exit();
            }
        } else {
            exit();
        }
    }
}
