<?php
// menyisipkan konfigurasi
include_once "config/core.php";

$harus_login = true;
include_once "cek_login.php";

// menyertakan database and file objects
include_once 'config/database.php';
include_once 'objects/produk.php';
include_once 'objects/kategori.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$produk = new Produk($db);
$kategori = new Kategori($db);
$judul_halaman = "Tambah Menu Masakan";
include_once "header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'><span class='glyphicon glyphicon-list'></span> Lihat Semua Menu Masakan</a>";
echo "</div>";

?>
<?php 
// jika formulir diklik "Tambah"
if($_POST){
    // setting nilai produk properti
    $produk->nama = $_POST['nama'];
    $produk->harga = $_POST['harga'];
    $produk->deskripsi = $_POST['deskripsi'];
    $produk->status_masakan = $_POST['status_masakan'];
    $produk->id_kategori = $_POST['id_kategori'];
    $gambar=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
    $produk->gambar = $gambar;

    // tambah produk
    if($produk->tambah()){
        echo "<div class='alert alert-success'>Menu berhasil ditambahkan.</div>";
        // upload file ketika tombol "Tambah" di klik
        // jika ada error, method uploadPhoto() akan memberikan pesan error.
        echo $produk->uploadPhoto();
    }
    // Jika gagal, kasih tahu pesan error
    else{
        echo "<div class='alert alert-danger'>Gagal menambahkan menu.</div>";
    }
}
?>

<!-- form HTML yang memunculkan tabel untuk membuat produk baru -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Nama</td>
        <td><input type='text' name='nama' class='form-control' required/></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td><input type='text' name='harga' class='form-control' required/></td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td><textarea name='deskripsi' class='form-control' required></textarea></td>
    </tr>
    <tr>
        <td>Status Masakan</td>
        <td>        
        <?php
        // masukkan ke drop-down form
        echo "<select class='form-control' name='status_masakan'>";
            echo "<option>Pilih status masakan...</option>";
            echo "<option>Ada</option>";
            echo "<option>Lagi kosong</option>";
        echo "</select>";
        ?></td>
    </tr>
    <tr>
        <td>Photo</td>
        <td><input type="file" name="image" required/></td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td>
        <?php

        // baca kategori dari database
        $stmt = $kategori->baca();

        // masukkan ke drop-down form
        echo "<select class='form-control' name='id_kategori'>";
            echo "<option>Pilih kategori...</option>";

            while ($baris_kategori = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($baris_kategori);
                echo "<option value='{$id}'>{$nama}</option>";
            }

        echo "</select>";
        ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </td>
    </tr>
</table>
</form>
<?php

// menyetting kaki
include_once "footer.php";
?>