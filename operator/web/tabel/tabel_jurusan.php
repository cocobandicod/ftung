<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

if ($_SESSION['level'] == 'Operator') {
    $sql = $proses->tampil_data_select('*', 'jurusan', '1=1 AND id_jurusan = "' . $_SESSION['id_jurusan'] . '" ORDER BY id_jurusan ASC');
} else {
    $sql = $proses->tampil_data_select('*', 'jurusan', '1=1 AND id_jurusan != "0" ORDER BY id_jurusan ASC');
}


$data = array();
$no = 1;
foreach ($sql as $row) {
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['nama_jurusan'];
    $subdata[] = $row['seo'];
    $subdata[] = $row['link'];
    $subdata[] = $row['doctoral'];
    $subdata[] = $row['magister'];
    $subdata[] = $row['mahasiswa'];
    $subdata[] = $row['alumni'];
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'jurusan/edit/' . $row['id_jurusan'] . '" class="dropdown-item">
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

$json_data = array(
    "data" =>  $data
);

echo json_encode($json_data);
