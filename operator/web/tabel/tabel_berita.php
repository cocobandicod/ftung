<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

if ($_SESSION['level'] == 'Operator') {
    $sql = $proses->tampil_data_select('*', 'berita', '1=1 AND id_jurusan = "' . $_SESSION['id_jurusan'] . '" ORDER BY tanggal DESC');
} else {
    $sql = $proses->tampil_data_select('*', 'berita', '1=1 ORDER BY tanggal DESC');
}

$data = array();
$no = 1;
foreach ($sql as $row) {
    if (!empty($row['file'])) {
        $link = $url . 'assets/images/berita/' . $row['file'];
        $gambar = '<a href="#" data-bs-toggle="modal" data-bs-target=".modal_form" data-link="' . $link . '"><i class="ph-image text-info"></i></a>';
    } else {
        $gambar = '<i class="ph-image text-danger"></i>';
    }
    if ($row['publish'] == 'Yes') {
        $publish = '<i class="ph-check-circle text-success me-2"></i>';
    } else {
        $publish = '<i class="ph-x-circle text-danger me-2"></i>';
    }
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['tanggal'];
    $subdata[] = $row['judul'];
    $subdata[] = $gambar;
    $subdata[] = $row['dibaca'];
    $subdata[] = $publish;
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'berita/edit/' . $row['id'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id'] . '" data-nama="' . $row['judul'] . '" data-act="del" class="dropdown-item">
                    <i class="ph-trash text-danger me-2"></i>
                    Hapus
                </a>
            </div>
        </div>
    </div>
    ';
    $data[] = $subdata;
    $no++;
}

$json_data = array(
    "data" =>  $data
);

echo json_encode($json_data);
