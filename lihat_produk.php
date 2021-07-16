<?php
// menyisipkan konfigurasi
include_once "config/core.php";

$harus_login = true;
include_once "cek_login.php";

// menyetting kepala
$judul_halaman = "Detail Menu Masakan";
include_once "header.php";

// tombol untuk melihat seluruh produk / kembali ke menu utama
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Lihat Semua Menu Masakan";
    echo "</a>";
echo "</div>";

// mendapatkan ID dari produk yang hendak dilihat
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ada.');

// sertakan database dan objek-objek
include_once 'config/database.php';
include_once 'objects/produk.php';
include_once 'objects/kategori.php';

// membuat koneksi database
$database = new Database();
$db = $database->getConnection();

// menyiapkan objek
$produk = new Produk($db);
$kategori = new Kategori($db);

// menyetting ID dari objek produk yang hendak dilihat
$produk->id = $id;

// membaca detail satu produk yang hendak dilihat
$produk->lihatSatu();
// tabel HTML untuk menampilkan data lengkap satu produk
echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<td>Nama</td>";
        echo "<td>{$produk->nama}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Harga</td>";
        echo "<td>Rp. {$produk->harga}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Deskripsi</td>";
        echo "<td>{$produk->deskripsi}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Status Masakan</td>";
        echo "<td>{$produk->status_masakan}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Kategori</td>";
        echo "<td>";
            // Menampilkan nama kategori
            $kategori->id=$produk->id_kategori;
            $kategori->bacaNama();
            echo $kategori->nama;
        echo "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Gambar</td>";
        echo "<td>";
            echo $produk->gambar ? "<img src='uploads/{$produk->gambar}' style='width:300px;' />" : "Tidak ada gambar yang terupload.";
        echo "</td>";
    echo "</tr>";
echo "</table>";

// menyetting kaki
include_once "footer.php";
?>