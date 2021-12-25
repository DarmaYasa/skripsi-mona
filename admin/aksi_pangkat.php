<?php

include '../env.php';
include '../auth/cek_session.php';

$pangkat_baru = $_POST['pangkat_baru'];
$pangkat_lama = $_POST['pangkat_lama'];
$id = $_POST['id'];

$query = "UPDATE pegawai SET pangkat_baru='$pangkat_baru', pangkat_lama='$pangkat_lama' WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    header("location: detail_pegawai.php?id=$id&alert=Berhasil");
} else {
    header("location: detail_pegawai.php?id=$id&alert=gagal");
}
