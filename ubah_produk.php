<?php
// menyisipkan konfigurasi
include_once "config/core.php";

$harus_login = true;
include_once "cek_login.php";

// menyetting kepala
$judul_halaman = "Ubah Menu Masakan";
include_once "header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'><span class='glyphicon glyphicon-list'></span> Lihat Semua Menu Masakan</a>";
echo "</div>";

// ambil ID dari produk yang ingin diedit
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ada.');

// menyertakan database dan objek produk, objek kategori
include_once 'config/database.php';
include_once 'objects/produk.php';
include_once 'objects/kategori.php';

// mendapatkan koneksi ke database
$database = new Database();
$db = $database->getConnection();

// menyiapkan objek
$produk = new Produk($db);
$kategori = new Kategori($db);

// menyetting ID dari properti yang hendak diedit
$produk->id = $id;

// menampilkan detail dari produk yang hendak diedit
$produk->lihatSatu();

?>
<?php 
// ketika formulir dikirim / tombol "ubah" diklik
if($_POST){
    // menambahkan nilai ke properti produk
    $produk->nama = $_POST['nama'];
    $produk->harga = $_POST['harga'];
    $produk->status_masakan = $_POST['status_masakan'];
    $produk->deskripsi = $_POST['deskripsi'];
    $produk->id_kategori = $_POST['id_kategori'];

    // mengubah produk
    if($produk->ubah()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Menu diubah.";
        echo "</div>";
    }
    // jika gagal mengubah produk, kasih tau pengguna website
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Gagal mengubah menu.";
        echo "</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Nama</td>
        <td><input type='text' name='nama' value='<?php echo $produk->nama; ?>' class='form-control' /></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td><input type='text' name='harga' value='<?php echo $produk->harga; ?>' class='form-control' /></td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td><textarea name='deskripsi' class='form-control'><?php echo $produk->deskripsi; ?></textarea></td>
    </tr>
    <tr>
        <td>Status Masakan</td>
        <td>
            <select class='form-control' name='status_masakan'>
                <option><?php echo $produk->status_masakan; ?></option>
                <option>Ada</option>
                <option>Lagi kosong</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td>
        <?php
        $stmt = $kategori->baca();

        // masukkan kategori ke drop-down
        echo "<select class='form-control' name='id_kategori'>";
            echo "<option>Pilih kategori...</option>";
            while ($baris_kategori = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id_kategori=$baris_kategori['id'];
                $nama_kategori = $baris_kategori['nama'];

                // kategori yang terkait harus ditampilkan di awal
                if($produk->id_kategori==$id_kategori){
                    echo "<option value='$id_kategori' selected>";
                }else{
                    echo "<option value='$id_kategori'>";
                }

                echo "$nama_kategori</option>";
            }
        echo "</select>";
        ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </td>
    </tr>
</table>
</form
<?php

// menyetting kaki
include_once "footer.php";
?>