<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

if (@$_POST['kat'] == 'Laboratorium') {
    $sql = $proses->tampil_data_select('*', 'profil_jurusan', '1=1 AND id_jurusan = "' . $_POST['id_jurusan'] . '" AND kat = "' . $_POST['kat'] . '"  ORDER BY id_profil ASC');

    $data = array();
    $no = 1;
    foreach ($sql as $row) {
        $subdata = array();
        $subdata[] = $no;
        $subdata[] = $row['judul'];
        $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'laboratorium/profil/edit/' . $row['id_profil'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>
    ';
        $data[] = $subdata;
        $no++;
    }
} else if (@$_POST['kat'] == 'Info-Laboratorium') {
    $sql = $proses->tampil_data_select('*', 'profil_jurusan', '1=1 AND id_jurusan = "' . $_POST['id_jurusan'] . '" AND kat = "' . $_POST['kat'] . '"  ORDER BY id_profil ASC');

    $data = array();
    $no = 1;
    foreach ($sql as $row) {
        $subdata = array();
        $subdata[] = $no;
        $subdata[] = $row['judul'];
        $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'laboratorium/info-laboratorium/edit/' . $row['id_profil'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>
    ';
        $data[] = $subdata;
        $no++;
    }
} else if (@$_POST['kat'] == 'Informasi') {
    $sql = $proses->tampil_data_select('*', 'profil_jurusan', '1=1 AND id_jurusan = "' . $_POST['id_jurusan'] . '" AND kat = "' . $_POST['kat'] . '"  ORDER BY id_profil ASC');

    $data = array();
    $no = 1;
    foreach ($sql as $row) {
        $subdata = array();
        $subdata[] = $no;
        $subdata[] = $row['judul'];
        $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'laboratorium/informasi/edit/' . $row['id_profil'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>
    ';
        $data[] = $subdata;
        $no++;
    }
} else {
    $sql = $proses->tampil_data_select('*', 'profil_jurusan', '1=1 AND id_jurusan = "' . $_POST['id_jurusan'] . '" AND kat = "Jurusan" ORDER BY id_profil ASC');

    $data = array();
    $no = 1;
    foreach ($sql as $row) {
        $subdata = array();
        $subdata[] = $no;
        $subdata[] = $row['judul'];
        $subdata[] = '
        <div class="d-inline-flex">
            <div class="dropdown">
                <a href="#" class="text-body" data-bs-toggle="dropdown">
                    <i class="ph-list"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="' . $url2 . 'profil/jurusan/' . $_POST['seo'] . '/edit/' . $row['id_profil'] . '" class="dropdown-item">
                        <i class="ph-note-pencil text-info me-2"></i>
                        Edit
                    </a>
                </div>
            </div>
        </div>
        ';
        $data[] = $subdata;
        $no++;
    }
}


$json_data = array(
    "data" =>  $data
);

echo json_encode($json_data);
