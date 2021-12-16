<?php include '../env.php'; include '../auth/cek_session.php'; ?>

<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>


	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../dist/css/bootstrap.min.css">

	<!-- icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		input {
			text-align: center;
			color: #000000;
		}

		::-webkit-input-placeholder {
			text-align: center;
			color: #000000;
		}

		:-moz-placeholder {
			text-align: center;
			color: #000000;
		}

		.hr-line {
            margin: 0px;
        }
	</style>
</head>

<body>

	<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
		Ekstensi Tidak Diperbolehkan
	</div>
	<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
		Ukuran File terlalu Besar
	</div>
	<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-check"></i> Success</h4>
		Berhasil Disimpan
	</div>
	<?php
			}
		}
		?>

	<div id="app">

		<nav class="navbar-light bg-light">
			<div class="container">
				<div class="mt-2">
					<div class="row">
						<div class="col-sm-1">
							<a class="navbar-brand" href="/">
								<img src="../dist/img//logo-1.png" alt="" width="70">
							</a>
						</div>

						<div class="col-sm-3">
							<div class="mt-2">
								<p class="text-dark">Dinas Perindustrian dan Tenaga Kerja Kabupaten badung</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<hr class="hr-line">

		<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse"></div>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link text-dark" href="index_admin.php">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark active" href="view_pegawai.php">Pegawai</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="view_pensiun.php">Pensiun</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="#">Tentang</a>
						</li>
						<li class="nav-item">
                            <a class="nav-link text-danger" href="../auth/logout.php">Logout</a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>

		<main class="">
			<div class="jumbotron text-dark" style="background-color: #63ccc5;color: #63ccc5; height: 10px;">
			</div>

			<div class="jumbotron text-dark"
				style="background-color: #63ccc5;color: #63ccc5; height: 80px; margin-bottom: 20px;">
				<div class="container">
					<div class="">
						<h3 class="">Detail Data Pegawai</h3>
					</div>
					<div class="row">
						<div class="col-sm-1 text-end">
							<a href="">
								<font color="black">Beranda</font>
							</a>
						</div>
						>
						<div class="col text-start">
							<p>
								<a href="view_pegawai.php">
									<font color="black">Pegawai</font>
								</a>
								 &nbsp > &nbsp Detail Data Pegawai</p>
						</div>
					</div>
				</div>
			</div>

			<div class="container">

				

				<?php

					$id = $_GET["id"];
					$data = "SELECT * FROM pegawai WHERE id = $id";
					$sql_d = mysqli_query($koneksi, $data);
					$row_d = mysqli_num_rows($sql_d);

					if($row_d > 0){
						while($d = mysqli_fetch_array($sql_d)){ 
						echo "<div class='row'>";

							echo "<div class='col-sm-2'>";

							echo "</div>";
							echo "<div class='col-sm-2'>";
							echo "<div>";
								echo "<img src='../gambar/".$d['nama_gambar']."' alt='' width='150px'>";
							echo "</div>";
							// echo "<div class='text-center mt-2' style='width: 150px;'>";
							// 	echo "<a class='btn btn-success rounded-0' href=''>Ubah Foto</a>";
							// echo "</div>";
						echo "</div>";
						echo "<div class='col-sm-5'>";
							echo "<div>";
								echo "<table class='table'>";
									echo "<tbody>";
										echo "<tr>";
											echo "<th scope='row'>Nama</th>";
											echo "<td>".$d['nama_lengkap']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Nip</th>";
											echo "<td>".$d['nip']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Tempat Lahir</th>";
											echo "<td>".$d['tempat_lahir']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Tanggal Lahir</th>";
											echo "<td>".$d['tanggal_lahir']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Jenis Kelamin</th>";
											echo "<td>".$d['jenis_kelamin']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Status</th>";
											echo "<td>".$d['status']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Agama</th>";
											echo "<td>".$d['agama']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Masa Jabatan</th>";
											echo "<td>".$d['masa_jabatan']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Tempat Tugas</th>";
											echo "<td>".$d['tempat_tugas']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>NO. SK Pensiun</th>";
											echo "<td>".$d['no_sk_pensiun']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Golongan</th>";
											echo "<td>".$d['golongan']."</td>";
										echo "</tr>";
										echo "<tr>";
											echo "<th scope='row'>Gaji Pokok</th>";
											echo "<td>".$d['gaji_pokok']."</td>";
										echo "</tr>";
									echo "</tbody>";
								echo "</table>";
							echo "</div>";

							echo "<div class='text-end'>";
								echo "<a class='btn btn-success rounded-0' href='edit_pegawai.php?id=" . $id . "'>Ubah Data</a>";
							echo "</div>";

							echo "</div>";
						echo "</div>";
						$nama_lengkap = $d['nama_lengkap'];
						}
					}else{ 
						echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
					}
			
				?>



				

			</div>
		</main>

	</div>

	<!-- Bootstrap Bundle with Popper -->
	<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>