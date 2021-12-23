<?php

include '../env.php';
include '../auth/cek_session.php';

$masa_kerja_gol_baru = $_POST['masa_kerja_gol_baru'];
$masa_kerja_gol_lama = $_POST['masa_kerja_gol_lama'];
$id = $_POST['id'];

$query = "UPDATE FROM pegawai SET masa_kerja_gol_baru='$masa_kerja_gol_baru', masa_kerja_gol_lama='$masa_kerja_gol_lama' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("location: view_pegawai.php?alert=Berhasil");
}
header("location: view_pegawai.php?alert=gagal");
