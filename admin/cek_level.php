<?php

// session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    if ($_SESSION['level'] != 'admin') {
        header("location:../403.php");
    }
}