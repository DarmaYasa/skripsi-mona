<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../env.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$_SESSION['pesan_login'] = '';
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../admin/index_admin.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="kasubag"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kasubag";
		// alihkan ke halaman dashboard pengurus
		header("location:../kasubag/index_kasubag.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	$_SESSION['pesan_login'] = 'Password atau username salah';
	header("location:login.php?pesan=Password atau username salah");
}

?>