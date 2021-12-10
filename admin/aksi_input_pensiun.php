<?php
include '../env.php';

$id = $_POST['id'];

$nama_lengkap = $_POST['nama_lengkap'];
$nip = $_POST['nip'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status = $_POST['status'];
$agama = $_POST['agama'];
$masa_jabatan = $_POST['masa_jabatan'];
$tempat_tugas = $_POST['tempat_tugas'];
$no_sk_pensiun = $_POST['no_sk_pensiun'];
$golongan = $_POST['golongan'];
$gaji_pokok = $_POST['gaji_pokok'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg');
$files = [
    'berkas_sk_pns' => $_FILES['berkas_sk_pns'],
    'berkas_kenaikan_pangkat' => $_FILES['berkas_kenaikan_pangkat'],
    'kartu_pegawai' => $_FILES['kartu_pegawai'],
    'berkas_karsi_karsu' => $_FILES['berkas_karsi_karsu'],
    'kartu_keluarga' => $_FILES['kartu_keluarga'],
];

foreach ($files as $key => $file) {
    $filename = $_FILES[$key]['name'];
    $ukuran = $_FILES[$key]['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $ekstensi) || $ukuran > (5 * 1024)) { //5MB
        header("location:detail_pensiun.php?alert=gagal_ekstensi");
    }

    if ($ukuran > (5 * 1024)) {
        header("location:detail_pensiun.php?alert=gagal_ukuran");
    }
}

$uploadedFiles = [];
foreach ($files as $key => $file) {
    $filePath = '../upload/' . time() . '_' . $_FILES[$key]['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $filePath);
}

//TODO: update mysql query
mysqli_query($koneksi, "UPDATE pegawai SET VALUES(NULL,'$xx','$nama_lengkap','$nip','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$status','$agama','$masa_jabatan','$tempat_tugas','$no_sk_pensiun','$golongan','$gaji_pokok','$xxx') WHERE id=$id");
header("location:view_pensiun.php?alert=berhasil");
