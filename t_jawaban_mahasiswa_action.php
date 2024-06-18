<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('model/t_jawaban_mahasiswa_model.php');
include_once('model/t_responden_mahasiswa_model.php');
include_once('model/koneksi.php');

$act = $_GET['act'];
$mahasiswa = new t_responden_mahasiswa();
$idRes = $mahasiswa->getRespondenId();

if ($act == 'simpan') {
    foreach ($_POST['jawaban'] as $soal_id => $jawaban) {
        $data = [
            'responden_mahasiswa_id' => $idRes,
            'soal_id' => $soal_id,
            'jawaban' => $jawaban,
        ];
        $insert = new t_jawaban_mahasiswa();
        $insert->insertData($data);
    }
    echo 'berhasil';
    // Redirect setelah sukses menyimpan data
    header('Location: layouts/terima_kasih.php');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new t_jawaban_mahasiswa();
    $hapus->deleteData($id);

    header('Location: t_responden_mahasiswa.php');
    exit();
}