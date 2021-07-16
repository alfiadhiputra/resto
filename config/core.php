<?php
// menampilkan error
error_reporting(E_ALL);

// memulai php session
session_start();

// menyetting zona waktu
date_default_timezone_set('Asia/Jakarta');

// alamat website, ubah sesuai dengan punya kamu
$alamat_web="http://localhost/resto/";

// tambahkan "halaman" pada url, untuk awal nilainya adalah 1
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// mengatur jumlah produk yang ditampilkan perhalaman
$produk_per_halaman = 5;

// menghitung batasan tergantung jumlah produk dan batasan per halaman
$batasan_halaman = ($produk_per_halaman * $halaman) - $produk_per_halaman;
?>