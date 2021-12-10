<?php
    include '../env.php';
    
    $id = $_POST['id'];

    $nama_lengkap = $_POST['nama_lengkap'];
    $nip = $_POST['nip'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $agama = $_POST['agama'];
    $masa_jabatan = $_POST['masa_jabatan'];
    $tempat_tugas = $_POST['tempat_tugas'];
    $no_sk_pensiun = $_POST['no_sk_pensiun'];
    $golongan = $_POST['golongan'];
    $gaji_pokok = $_POST['gaji_pokok'];

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        header("location:view_pensiun.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 1044070){		
            $xxx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/'.$rand.'_'.$filename);
            mysqli_query($koneksi, "UPDATE pegawai SET VALUES(NULL,'$xx','$nama_lengkap','$nip','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$status','$agama','$masa_jabatan','$tempat_tugas','$no_sk_pensiun','$golongan','$gaji_pokok','$xxx') WHERE id=$id");
            header("location:view_pensiun.php?alert=berhasil");
        }else{
            header("location:view_pensiun.php?alert=gagal_ukuran");
        }
    }
?>