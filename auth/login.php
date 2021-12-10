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
	</style>
</head>
<body>
	
<div class="container">
    <div class="text-center">
        <img src="../dist/img/user-1.png" width="200px" height="200px" class="rounded" alt="...">
    </div>
    <div class="text-center">

        <form action="cek_login.php" method="post">
            <div class="mb-3 mt-3 d-flex justify-content-center">
                <div class="">   
                    <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="USERNAME">
                </div>
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <div class="">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="PASSWORD">
                </div>
            </div>
            <input type="submit" class="btn btn-primary rounded-0" value="LOGIN">
        </form>
        
    </div>
</div> 
	
	<!-- Bootstrap Bundle with Popper -->
	<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>