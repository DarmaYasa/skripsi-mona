<?php

include '../env.php';
include '../auth/cek_session.php';

$id = $_POST['id'];
$id_pensiun = $_POST['id_pensiun'];
$nip = $_POST['nip'];
$nama_lengkap = $_POST['nama_lengkap'];
$unit_kerja = $_POST['unit_kerja'];
$status = $_POST['status'];
$alamat = $_POST['alamat'];
$berhenti_akhir_bulan = $_POST['berhenti_akhir_bulan'];
$tanggal_pensiun = $_POST['tanggal_pensiun'];
$masa_kerja_pensiun = $_POST['masa_kerja_pensiun'];
$gaji_pokok = $_POST['gaji_pokok'];
$keterangan = $_POST['keterangan'];

if ($id_pensiun != '') {
    $query = "SELECT id FROM pensiun WHERE nip='$nip' AND id!=$id_pensiun";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        header("location:view_pensiun.php?alert=data_sudah_ada");
        return;
    }
    $query = "UPDATE pensiun SET nip='$nip', nama='$nama_lengkap', unit_kerja='$unit_kerja', `status`='$status', alamat_pensiun='$alamat', berhenti_akhir_bulan='$berhenti_akhir_bulan', tanggal_pensiun='$tanggal_pensiun', masa_kerja_pensiun='$masa_kerja_pensiun', gaji_pokok='$gaji_pokok', keterangan='$keterangan' WHERE id_pegawai='$id'";
} else {
    $query = "SELECT id FROM pensiun WHERE nip='$nip'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        header("location:view_pensiun.php?alert=data_sudah_ada");
        return;
    }
    $query = "INSERT INTO pensiun VALUES(NULL, '$id', '$nip', '$nama_lengkap', '$unit_kerja', '$status', '$alamat', '$berhenti_akhir_bulan', '$tanggal_pensiun', '$masa_kerja_pensiun', '$gaji_pokok', '$keterangan')";
}

echo $query;

if (mysqli_query($koneksi, $query)) {
    header("location: view_pensiun.php?alert=berhasil");
} else {
    header("location: view_pensiun.php?alert=gagal");
}
