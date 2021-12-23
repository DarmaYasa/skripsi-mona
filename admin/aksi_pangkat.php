<?php

include '../env.php';
include '../auth/cek_session.php';

$pangkat_baru = $_POST['pangkat_baru'];
$pangkat_lama = $_POST['pangkat_lama'];
$id = $_POST['id'];

$query = "UPDATE FROM pegawai SET pangkat_baru='$pangkat_baru', pangkat_lama='$pangkat_lama' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("location: view_pegawai.php?alert=Berhasil");
}
header("location: view_pegawai.php?alert=gagal");
