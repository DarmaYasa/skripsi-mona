<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    if ($_SESSION['level'] != 'kasubag') {
        header("location:../403.php");
    }
}