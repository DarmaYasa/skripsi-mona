<?php include '../env.php';include '../auth/cek_session.php'; include 'cek_level.php';?>

<?php

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
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
			/* text-align: center; */
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

		if (isset($_GET['alert'])) {
			if ($_GET['alert'] == 'gagal_ekstensi') {
				?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
				Ekstensi Tidak Diperbolehkan
			</div>
			<?php
		} elseif ($_GET['alert'] == "gagal_ukuran") {
				?>
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
				Ukuran File terlalu Besar
			</div>
			<?php
		} elseif ($_GET['alert'] == "berhasil") {
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
						<h3 class="">Form Pangkat</h3>
					</div>
					<div class="row">
						<div class="col-sm-1 text-end">
							<a href="index_admin.php">
								<font color="black">Beranda</font>
							</a>
						</div>
						>
						<div class="col text-start">
							<p>
								<a href="view_pegawai.php">
									<font color="black">Pegawai</font>
								</a>
								 &nbsp > &nbsp Form Pangkat</p>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
		<h2 style="text-align: center;">Form Pangkat</h2>
		<form action="aksi_input.php" method="post" enctype="multipart/form-data">
			<div class="form-group mb-2">
				<label class="mb-1" for="">NIP :</label>
				<input type="text" min="0" class="form-control" name="nip" id="" required="required">
			</div>
			<div class="form-group mb-2">
				<label class="mb-1">Nama :</label>
				<input type="text" min="0" class="form-control" name="nama_lengkap" required="required">
			</div>
			<div class="form-group mb-2">
				<label class="mb-1">Unit Kerja :</label>
				<input type="text" min="0" class="form-control" name="unit_kerja" required="required">
			</div>
			<div class="form-group mb-2">
                <label class="mb-1">Status :</label>
                <select name="status" class="form-control" required>
                    <option value="" disabled selected>-Pilih Status-</option>
                    <option value="1">Aktif</option>
                    <option value="2">Pensiun</option>
                </select>
			</div>
            <div class="form-group mb-2">
                <label class="mb-1">Alamat :</label>
                <textarea name="alamat" class="form-control" rows="5"></textarea>
			</div>
            <div class="form-group mb-2">
                <label class="mb-1">Berhenti Akhir Bulan :</label>
                <input type="month" class="form-control" name="berhenti_akhir_bulan" required="required">
			</div>
            <div class="form-group mb-2">
                <label class="mb-1">Tanggal Pensiun :</label>
                <input type="date" class="form-control" name="tanggal_pensiun" required="required">
			</div>
            <div class="form-group mb-2">
                <label class="mb-1">Masa Kerja Pensiun :</label>
                <input type="number" class="form-control" name="masa_kerja_pensiun" required="required">
			</div>
            <div class="form-group mb-2">
                <label class="mb-1">Gaji Pokok :</label>
                <input type="number" class="form-control" name="gaji_pokok" required="required">
			</div>
            <div class="form-group mb-2">
                <label class="mb-1">Keteragan :</label>
                <textarea name="keterangan" class="form-control" rows="5"></textarea>
			</div>
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div>

		</main>

	</div>

	<!-- Bootstrap Bundle with Popper -->
	<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>