<?php

include '../env.php';
include '../auth/cek_session.php';

$masa_kerja_gol_baru = $_POST['masa_kerja_gol_baru'];
$masa_kerja_gol_lama = $_POST['masa_kerja_gol_lama'];
$id = $_POST['id'];

$query = "UPDATE pegawai SET masa_kerja_gol_baru='$masa_kerja_gol_baru', masa_kerja_gol_lama='$masa_kerja_gol_lama' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("location: detail_pegawai.php?id=$id&alert=Berhasil");
} else {
    header("location: detail_pegawai.php?id=$id&alert=gagal");
}
