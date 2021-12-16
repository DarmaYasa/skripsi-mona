<?php
    include '../env.php';
    include '../auth/cek_session.php';
    
    $id = $_POST['id'];

    $terverifikasi = $_POST['terverifikasi'];
    
    mysqli_query($koneksi, "UPDATE berkas_pensiun SET terverifikasi='$terverifikasi' WHERE id_pegawai=$id");
    header("location:view_berkas_pensiun.php?alert=berhasil");
?>