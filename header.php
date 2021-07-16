<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $judul_halaman; ?></title>
    <link rel="short icon" href="images/resto3.png">
    <!-- Menyisipkan Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $alamat_web; ?>libs/css/bootstrap.css" />
    <!-- Menyisipkan CSS tambahan -->
    <link rel="stylesheet" href="<?php echo $alamat_web; ?>libs/css/custom.css" />
    <!-- Menyisipkan Pelanggan CSS -->
    <link rel="stylesheet" href="<?php echo $alamat_web; ?>libs/css/pelanggan.css" />
</head>
<body>
    <!-- menyisipkan navigasi.php -->
    <?php include_once 'navigasi.php'; ?>
    <!-- container -->
    <div class="container">
        <div class='page-header'>
            <h3 class='well'><?php echo $judul_halaman; ?></h3>
        </div>