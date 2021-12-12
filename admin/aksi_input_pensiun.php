<?php
include '../env.php';

$id = $_POST['id'];

$rand = rand();
$ekstensi = array('pdf');
$files = [
    'berkas_sk_pns' => $_FILES['berkas_sk_pns'],
    'berkas_kenaikan_pangkat' => $_FILES['berkas_kenaikan_pangkat'],
    'kartu_pegawai' => $_FILES['kartu_pegawai'],
    'berkas_karsi_karsu' => $_FILES['berkas_karsi_karsu'],
    'kartu_keluarga' => $_FILES['kartu_keluarga'],
    'alamat_pensiun' => $_FILES['alamat_pensiun'],
];

foreach ($files as $key => $file) {
    $filename = $_FILES[$key]['name'];
    $ukuran = $_FILES[$key]['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $ekstensi)) {
        header("location:detail_pensiun.php?id='$id'&alert=gagal_ekstensi");
    }

    if ($ukuran > (5 * 1024 * 1024)) {
        header("location:detail_pensiun.php?id='$id'&alert=gagal_ukuran");
    }
}

$uploadedFiles = [];
foreach ($files as $key => $file) {
    if (!file_exists('../upload/' . $key)) {
        mkdir('../upload/' . $key, 0777, true);
    }
    $$key = '../upload/' . $key . '/' . time() . '_' . $_FILES[$key]['name'];
    move_uploaded_file($_FILES[$key]['tmp_name'], $$key);
}

$check = mysqli_query($koneksi, "SELECT * FROM berkas_pensiun WHERE id_pegawai=$id");

if (mysqli_num_rows($check) > 0) {
    header("location:view_pensiun.php?alert=data_sudah_ada");
}

$query = "INSERT INTO berkas_pensiun (id_pegawai, berkas_sns, berkas_kenaikan_pangkat, kartu_pegawai, berkas_karsi, kartu_keluarga, surat_ket_alamat_pensiun, terverifikasi) VALUES ('$id', '$berkas_sk_pns', '$berkas_kenaikan_pangkat', '$kartu_pegawai', '$berkas_karsi_karsu', '$kartu_keluarga', '$alamat_pensiun', '0')";

if (mysqli_query($koneksi, $query)) {
    header("location:view_pensiun.php?alert=berhasil");
} else {
    header("location:view_pensiun.php?alert=gagal");
}
