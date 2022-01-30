<?php
    include '../env.php';
    include '../auth/cek_session.php';
    
    $id = $_POST['id'];

    $terverifikasi = $_POST['terverifikasi'];
    $keterangan = $_POST['keterangan'];
    
    mysqli_query($koneksi, "UPDATE berkas_pensiun SET terverifikasi='$terverifikasi', keterangan='$keterangan' WHERE id_pensiun=$id");
    header("location:view_pensiun.php?alert=berhasil");
?>