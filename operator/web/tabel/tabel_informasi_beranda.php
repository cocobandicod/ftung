<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

$sql = $proses->tampil_data_select('*', 'informasi', '1=1 AND posisi = "Beranda" ORDER BY urutan ASC');

$data = array();
$no = 1;
foreach ($sql as $row) {
    if ($row['publish'] == 'Yes') {
        $publish = '<i class="ph-check-circle text-success me-2"></i>';
    } else {
        $publish = '<i class="ph-x-circle text-danger me-2"></i>';
    }
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['urutan'];
    $subdata[] = $row['judul'];
    $subdata[] = $row['deskripsi'];
    $subdata[] = $publish;
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'informasi/beranda/edit/' . $row['id'] . '" class="dropdown-item">
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
