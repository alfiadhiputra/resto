<?php
// menyisipkan konfigurasi
include_once "config/core.php";

$harus_login = true;
include_once "cek_login.php";

// tambahkan "halaman" pada url, untuk awal nilainya adalah 1
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// mengatur jumlah produk yang ditampilkan perhalaman
$produk_per_halaman = 6;

// menghitung batasan tergantung jumlah produk dan batasan per halaman
$batasan_halaman = ($produk_per_halaman * $halaman) - $produk_per_halaman;

// menyertakan database dan objek kategori, objek produk
include_once 'config/database.php';
include_once 'objects/produk.php';
include_once 'objects/kategori.php';

// membuat objek database, objek produk, dan objek kategori
$database = new Database();
$db = $database->getConnection();
$produk = new Produk($db);
$kategori = new Kategori($db);

// mengkalkulasi jumlah produk dan menghitung berapa halaman yang akan tampil
$stmt = $produk->lihatSemua($batasan_halaman, $produk_per_halaman);
$jumlah = $stmt->rowCount();

// menyetting kepala
$judul_halaman = "Menu Masakan";
include_once "header.php";
echo "<style>
	}
		*{margin: 0;padding: 0;font-family: titillium;}
		@keyframes muncul{
		0%{opacity: 0;}
		100%{opacity: 1;}
	}
		body{animation-name: muncul;animation-duration: 2s}
		.both{clear: both;}
	}
</style>";
?>
<?php
if (isset($_SESSION['level_akses']) && in_array($_SESSION['level_akses'], array("administrator", "waiter", "kasir", "owner"))){
?>
<div class='right-button-margin'>
    <a href='tambah_produk.php' class='btn btn-primary pull-right'>Tambah Menu Masakan</a>
</div>
<?php } ?>

<?php
// menampilkan produk jika ada
if($jumlah>0){
    echo "<div class='col-md-12'>";
    while ($baris_produk = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($baris_produk);
        $kategori->id = $id_kategori;
        $kategori->bacaNama();
        ?>
        <div class="col">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                <a href="<?php echo "lihat_produk.php?id={$id}"; ?>">
                    <img src="uploads/<?php echo $gambar; ?>" alt="<?php echo $nama; ?>">
                </a>
                <div class="caption mb-6">
                    <h3><?php echo $nama; ?></h3>
                    <p>Deskripsi: <?php echo $deskripsi; ?></p>
                    <p>Status Masakan: <span class="label label-warning"><?php echo $status_masakan; ?></span></p>
                    <p><span class="label label-success">
                        <small>Rp. <?php echo number_format($harga, 2, '.', ','); ?></span> / 
                        <?php echo $kategori->nama; ?></small>
                        <!-- <a href="<?php echo "ubah_produk.php?id={$id}"; ?>" role="button">Edit</a> / 
                        <a delete-id='<?php echo $id; ?>' class='delete-object' role="button">Hapus</a> -->
                    </p>
                    <!-- <p><button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Tambahkan Ke Pesanan</button></p> -->
                    <p><a href="cart.php?id=<?php echo $id; ?>&action=add" class="btn btn-primary btn-block" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Tambahkan Ke Pesanan</a></p>
                    <!-- <p><a href="<?php echo "lihat_produk.php?id={$id}"; ?>" class="btn btn-default btn-block" role="button">Details</a></p>-->
                    <p><a href="<?php echo "lihat_produk.php?id={$id}"; ?>" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Details</a>
                        <?php
                        if (isset($_SESSION['level_akses']) && in_array($_SESSION['level_akses'], array("administrator", "waiter", "kasir", "owner"))){
                        ?>
                        <span class="pull-right"><a href="<?php echo "ubah_produk.php?id={$id}"; ?>" role="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                        <a delete-id='<?php echo $id; ?>' class='delete-object btn btn-danger' role="button"><span class="glyphicon glyphicon-trash"></span></a></span></p>
                        <?php } ?>
                </div>
                </div>
            </div>
        </div>
        <?php
    }
    echo "</div>";
        // halaman yang digunakan
        $alamat_halaman = "index.php?";

        // hitung jumlah total produk untuk mencari jumlah halaman
        $jumlah_halaman = $produk->hitungSemua();
    
        // tombol halaman
        include_once 'halaman.php';    
}

// kasih tahu kepada pengguna jika tidak ada produk
else{
    echo "<div class='alert alert-info'>Tidak ada produk.</div>";
}

// menyetting kaki
include_once "footer.php";
?>