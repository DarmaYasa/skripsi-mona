<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>
<body>
    <?php

session_start();

$level = 'admin';

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    $level = $_SESSION['level'];
}

?>
    <h1>Akses tidak ditemukan</h1>
    <br>
    <a href="auth/logout.php">Logout dan login dengan akun baru</a> <a href="<?=$level == 'admin' ? 'admin' : 'kasubag';?>">Kembali ke beranda</a>
</body>
</html>