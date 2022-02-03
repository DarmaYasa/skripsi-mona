<?php include '../env.php'; include '../auth/cek_session.php'; include 'cek_level.php'; include '../helpers/pagination.php'; ?>

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
			}elseif($_GET['alert']=="data_sudah_ada"){
				?>
		<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
			Data sudah ada
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
						<div class="col-sm-7"></div>
						<div class="col-sm-1">
							<?php include 'notif.php'; ?>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<hr class="hr-line">

		<?php include "nav.php" ?>

		<main class="">
			<div class="jumbotron text-dark" style="background-color: #63ccc5;color: #63ccc5; height: 10px;">
			</div>

			<div class="jumbotron text-dark"
				style="background-color: #63ccc5;color: #63ccc5; height: 80px; margin-bottom: 20px;">
				<div class="container">
					<div class="">
						<h3 class="">Data Pensiun</h3>
					</div>
					<div class="row">
						<div class="col-sm-1 text-end">
							<a href="index_admin.php">
								<font color="black">Beranda</font>
							</a>
						</div>
						>
						<div class="col text-start">
							<p>Pensiun</p>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mb-3">
					<div class="col col-lg-2">
						<form action="print_pensiun.php">
							<div class="d-flex">
								<input type="text" name="year" class="form-control text-left" placeholder="Tahun" value="<?= date('Y') ?>">
								<button class="btn btn-secondary rounded-0" type="submit">Cetak</button>
							</div>
						</form>
					</div>
					<div class="col">

					</div>
					<div class="col">
						<div class="text-end">
							<form action="">
							<div class="input-group mb-3">
								<input class="form-control rounded-0" type="text" placeholder="Search.." name="search">
								<div class="input-group-append">
									<button class="btn btn-secondary rounded-0" type="submit"><i
											class="fa fa-search"></i></button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<table class="table table-secondary">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Status</th>
									<th scope="col">Opsi</th>
								</tr>
							</thead>
							<tbody>

							<?php 
								$page = isset($_GET['page']) && $_GET['page'] >= 1 ? $_GET['page'] : 1;
								$limit = 10;
								$no = 1;
								$search = isset($_GET['search']) ? $_GET['search'] : '';
								$query = "SELECT * FROM pensiun WHERE nama LIKE '%" . (array_key_exists('search', $_GET) ? $_GET['search'] : '') . "%'";
								// echo $query;
								$sql = mysqli_query($koneksi, $query);
								$row = mysqli_num_rows($sql);
								$total_page = ceil($row / $limit);
								$skip = ($page > 1) ? (($page - 1) * $limit) : 0;	
								$no = $skip + 1;
								$links = generate_pagination($total_page, $page);
								$query = $query . " LIMIT $skip, $limit";
								$sql = mysqli_query($koneksi, $query);
								$row = mysqli_num_rows($sql);
								$statuses = [
									'0' => 'Belum Verifikasi',
									'1' => 'Verifikasi',
									'2' => 'Revisi'
								];

								if($row > 0){
								while($d = mysqli_fetch_array($sql)){
									echo "<tr>";
									echo "<td>".$no++."</td>";
									echo "<td>".$d['nama']."</td>";
									echo "<td>".$statuses[$d['terverifikasi']]."</td>";
									$id = $d['id_pegawai'];
									echo "<td>
											<a href='detail_pensiun.php?id=$id'>Detail<a>
										</td>
									</tr>";
									}
								}else{ 
									echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
								}
							?>
							</tbody>
						</table>
						<nav aria-label="Page navigation example">
							<ul class="pagination justify-content-end">
								<li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
									<?php if($page == 1) : ?>
										<span class="page-link">&laquo;</span>
									<?php else: ?>
										<a class="page-link" href="<?= '?page=' . (1) . '&search=' . $search ?>">&laquo;</a>
									<?php endif; ?>
								</li>
								<li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
									<?php if($page == 1) : ?>
										<span class="page-link">&lsaquo;</span>
									<?php else: ?>
											<a class="page-link" href="<?= '?page=' . ($page - 1) . '&search=' . $search ?>">&lsaquo;</a>
									<?php endif; ?>
								</li>
								<?php foreach($links as $link): ?>
								<li class="page-item <?= $link['active'] ? 'active' : '' ?> <?= $link['label'] == '...' ? 'disabled' : ''?> ?>">
									<?php if($link['active'] || $link['label'] == '...') : ?>
										<span class="page-link"><?= $link['label'] ?></span>
									<?php else: ?>
										<a class="page-link" href="<?= '?page=' . $link['label'] . '&search=' . $search ?>"><?= $link['label'] ?></a>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
								<li class="page-item <?= $page == $total_page ? 'disabled' : '' ?>">
									<?php if($page == $total_page) : ?>
										<span class="page-link">&rsaquo;</span>
									<?php else: ?>
											<a class="page-link" href="<?= '?page=' . ($page - 1) . '&search=' . $search ?>">&rsaquo;</a>
									<?php endif; ?>
								</li>
								<li class="page-item <?= $page == $total_page ? 'disabled' : '' ?>">
									<?php if($page == $total_page) : ?>
										<span class="page-link">&raquo;</span>
									<?php else: ?>
											<a class="page-link" href="<?= '?page=' . ($total_page) . '&search=' . $search ?>">&raquo;</a>
									<?php endif; ?>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</main>

	</div>

	<!-- Bootstrap Bundle with Popper -->
	<script src="../dist/js/bootstrap.bundle.min.js"></script>
	<script>
// 		var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
// var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
//   return new bootstrap.Dropdown(dropdownToggleEl)
// })
	</script>
</body>