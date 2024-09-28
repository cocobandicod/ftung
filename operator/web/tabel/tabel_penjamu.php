<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

$sql = $proses->tampil_data_select('*', 'penjamu', '1=1 ORDER BY menu DESC');

$data = array();
$no = 1;
foreach ($sql as $row) {
    if (!empty($row['nama_file'])) {
        $link = $url . 'berkas/' . $row['nama_file'];
        $gambar = '<a href="' . $link . '" target="_blank"><i class="ph-file-pdf text-info"></i></a>';
    } else {
        $gambar = '<i class="ph-image text-danger"></i>';
    }
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['judul'];
    $subdata[] = strtoupper(str_replace('-', ' ', $row['menu']));
    $subdata[] = $gambar;
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'penjamu/edit/' . $row['id_mutu'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id_mutu'] . '" data-nama="' . $row['judul'] . '" data-act="del" class="dropdown-item">
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
