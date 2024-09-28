<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

$sql = $proses->tampil_data_select(
    'a.*,b.nama_jurusan',
    'link_jurnal a LEFT JOIN jurusan b
    ON a.id_jurusan = b.id_jurusan',
    '1=1 ORDER BY b.id_jurusan ASC'
);

$data = array();
$no = 1;
foreach ($sql as $row) {
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['nama_jurusan'];
    $subdata[] = $row['jurnal'];
    $subdata[] = $row['link'];
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'jurnal/edit/' . $row['id_jurnal'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id_jurnal'] . '" data-nama="' . $row['jurnal'] . '" data-act="del" class="dropdown-item">
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
