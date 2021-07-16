<?php
// menyisipkan konfigurasi
include_once "config/core.php";

// menghapus session, ini akan menghapus semua data login
session_destroy();

// alihkan ke halaman login
header("Location: {$alamat_web}login.php");
?>