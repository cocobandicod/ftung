<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

$sql = $proses->tampil_data_select('*', 'profil', '1=1 AND status = "ppid" ORDER BY id_profil ASC');

$data = array();
$no = 1;
foreach ($sql as $row) {
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = strtoupper(str_replace('-', ' ', $row['judul_seo']));
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'ppid/edit/' . $row['id_profil'] . '" class="dropdown-item">
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
