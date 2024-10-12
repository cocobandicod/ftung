<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

$sql = $proses->tampil_data_select('*', 'download', '1=1 AND id_jurusan = "' . $_SESSION['id_jurusan'] . '" AND kategori = "' . $_POST['kat'] . '" ORDER BY created_at DESC');

$data = array();
$no = 1;
foreach ($sql as $row) {
    if (!empty($row['file'])) {
        $link = $url . 'berkas/' . $row['file'];
        $gambar = '<a href="' . $link . '" target="_blank"><i class="ph-file-pdf text-info"></i></a>';
    } else {
        $gambar = '<i class="ph-image text-danger"></i>';
    }
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['nama_file'];
    $subdata[] = strtoupper(str_replace('-', ' ', $row['kategori']));
    $subdata[] = $gambar;
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'laboratorium/download/' . $_POST['kat'] . '/edit/' . $row['id_download'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id_download'] . '" data-nama="' . $row['nama_file'] . '" data-act="del" class="dropdown-item">
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
