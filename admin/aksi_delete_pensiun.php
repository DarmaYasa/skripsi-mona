<?php
include '../env.php';
include '../auth/cek_session.php';

$id = $_POST['id'];

$query = "DELETE FROM berkas_pensiun WHERE id_pegawai='$id'";

if (mysqli_query($koneksi, $query)) {
    header("location:view_pensiun.php?alert=berhasil");
} else {
    header("location:view_pensiun.php?alert=gagal");
}
