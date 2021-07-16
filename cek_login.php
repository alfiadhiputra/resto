<?php
if(isset($harus_login) && $harus_login==true){
    // jika pengguna belum login, alihkan ke halaman login
    if(!isset($_SESSION['logged_in'])){
        header("Location: {$alamat_web}login.php?action=please_login");
    }
}
// jika hendak mengakses halaman 'login' atau 'register' atau 'daftar' tapi pengguna sudah login
else if(isset($judul_halaman) && ($judul_halaman=="Login" || $judul_halaman=="Register")){
    // jika pengguna sudah login, alihkan ke halaman utama
    if(isset($_SESSION['logged_in']) && $_SESSION['id_pengguna']==1){
        header("Location: {$alamat_web}index.php?action=already_logged_in");
    }else if(isset($_SESSION['logged_in']) && $_SESSION['id_pengguna']==2){
        header("Location: {$alamat_web}index.php?action=already_logged_in");
    }else if(isset($_SESSION['logged_in']) && $_SESSION['id_pengguna']==3){
        header("Location: {$alamat_web}cart.php?action=already_logged_in");
    }else if(isset($_SESSION['logged_in']) && $_SESSION['id_pengguna']==4){
        header("Location: {$alamat_web}laporan.php?action=already_logged_in");
    }
}
else{
    // tidak ada masalah
}
?>