<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

if ($_SESSION['level'] == 'Operator') {
    $sql = $proses->tampil_data_select(
        'a.*,b.nama_jurusan',
        'data_dosen a LEFT JOIN jurusan b
        ON a.id_jurusan = b.id_jurusan',
        '1=1 AND a.id_jurusan = "' . $_SESSION['id_jurusan'] . '" ORDER BY a.id_dosen ASC'
    );
} else {
    $sql = $proses->tampil_data_select(
        'a.*,b.nama_jurusan',
        'data_dosen a LEFT JOIN jurusan b
        ON a.id_jurusan = b.id_jurusan',
        '1=1 ORDER BY a.id_dosen ASC'
    );
}

$data = array();
$no = 1;
foreach ($sql as $row) {
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['nidn'];
    $subdata[] = $row['nama'];
    $subdata[] = $row['nama_jurusan'];
    $subdata[] = $row['jabatan_akademik'];
    $subdata[] = $row['gelar_akademik'];
    $subdata[] = $row['id_scholar'];
    $subdata[] = $row['id_sinta'];
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'dosen/edit/' . $row['id_dosen'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id_dosen'] . '" data-nama="' . $row['nama'] . '" data-act="del" class="dropdown-item">
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
