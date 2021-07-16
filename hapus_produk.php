<?php
// cek jika ada proses POST
if($_POST){
    // sertakan file database dan objek produk
    include_once 'config/database.php';
    include_once 'objects/produk.php';

    // mendapatkan koneksi ke database
    $database = new Database();
    $db = $database->getConnection();

    // mempersiapkan objek produk
    $produk = new Produk($db);

    // menyetting ID dari produk yang hendak di hapus
    $produk->id = $_POST['object_id'];

    // hapus produk
    if($produk->hapus()){
        echo "Menu telah dihapus.";
    }
    // Jika gagal menghapus produk, tampilkan pesan error
    else{
        echo "Gagal menghapus menu.";
    }
}
?>