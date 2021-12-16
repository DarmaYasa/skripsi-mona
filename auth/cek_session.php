<?php

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['level'])) {
    if ($_SERVER['PHP_SELF'] != '/skripsi-mona/auth/login.php') {
        header("location:../auth/login.php");
    }
} else {
    if ($_SERVER['PHP_SELF'] == '/skripsi-mona/auth/login.php') {
        if ($_SESSION['level'] == 'kasubag') {
            header("location:../kasubag/index_kasubag.php");
        } else {
            header("location:../admin/index_admin.php");
        }
    }
}


