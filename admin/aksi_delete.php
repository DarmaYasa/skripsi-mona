<?php
include '../env.php';
include '../auth/cek_session.php';

$id = $_POST['id'];

mysqli_query($koneksi, "DELETE FROM pegawai WHERE id=$id");
header("location:view_pegawai.php?alert=berhasil");
