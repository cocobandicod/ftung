<?php
session_start();
require_once('../../../config/koneksi.php');
require_once('../../../config/cek_ajax.php');

if ($_SESSION['level'] == 'Operator') {
    $sql = $proses->tampil_data_select(
        'a.*,b.nama_jurusan',
        'akreditasi a LEFT JOIN jurusan b
        ON a.id_jurusan = b.id_jurusan',
        '1=1 AND a.id_jurusan = "' . $_SESSION['id_jurusan'] . '"  ORDER BY b.id_jurusan ASC'
    );
} else {
    $sql = $proses->tampil_data_select(
        'a.*,b.nama_jurusan',
        'akreditasi a LEFT JOIN jurusan b
        ON a.id_jurusan = b.id_jurusan',
        '1=1 ORDER BY b.id_jurusan ASC'
    );
}
$data = array();
$no = 1;
foreach ($sql as $row) {
    if (!empty($row['file'])) {
        $link = $url . 'berkas/' . $row['file'];
        $gambar = '<a href="' . $link . '" target="_blank"><i class="ph-file-pdf text-info"></i></a>';
    } else {
        $gambar = '<i class="ph-x-circle text-danger"></i>';
    }
    $subdata = array();
    $subdata[] = $no;
    $subdata[] = $row['nama_jurusan'];
    $subdata[] = $row['prodi'];
    $subdata[] = $row['peringkat'];
    $subdata[] = $row['no_sk'];
    $subdata[] = $gambar;
    $subdata[] = '
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="' . $url2 . 'akreditasi/edit/' . $row['id_akreditasi'] . '" class="dropdown-item">
                    <i class="ph-note-pencil text-info me-2"></i>
                    Edit
                </a>
                <a href="#" id="del" data-id="' . $row['id_akreditasi'] . '" data-nama="' . $row['prodi'] . '" data-act="del" class="dropdown-item">
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
