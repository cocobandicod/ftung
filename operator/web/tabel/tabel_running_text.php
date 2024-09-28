<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

$sql = $proses->tampil_data_select('*', 'running_text', '1=1 ORDER BY datetime DESC');

$data = array();
$no = 1;
foreach ($sql as $row) {
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['text'];
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'running/text/edit/' . $row['id'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id'] . '" data-nama="' . $row['text'] . '" data-act="del" class="dropdown-item">
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
