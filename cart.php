<?php
// menyisipkan konfigurasi
include_once "config/core.php";

$harus_login = true;
include_once "cek_login.php";

// menyetting kepala
$judul_halaman = "Keranjang Pesanan";
include_once "header.php";
echo "<style>
	}
		*{margin: 0;padding: 0;font-family: titillium;}
		@keyframes muncul{
		0%{opacity: 0;}
		100%{opacity: 1;}
	}
		body{animation-name: muncul;animation-duration: 1.5s}
		.both{clear: both;}
	}
</style>";

// menyertakan class database, produk, & item
include_once 'config/database.php';
include_once 'objects/produk.php';
include_once 'objects/item.php';

// mendapatkan koneksi ke database & membuat object produk
$database = new Database();
$db = $database->getConnection();
$produk = new Produk($db);

if (!isset($_SESSION["cart"])){
$_SESSION['cart'] = [];
}
// ketika produk ditambahkan ke cart
if (isset($_GET['id']) && !isset($_POST['update'])) {
    $produk->id = $_GET['id'];
    $produk->lihatSatu();
    $item = new Item();
    $item->id = $produk->id;
    $item->name = $produk->nama;
    $item->price = $produk->harga;
    $item->quantity = 1;
    // cek apakah produk sudah ada di dalam cart
    $index = -1;
    if (isset($_GET['id'])){
        $cart = unserialize(serialize($_SESSION['cart'])); // jadikan $cart sebagai sebuah array, unserialize() mengubah string menjadi array
    } else {
        $_SESSION['cart'] = [];
    }

        for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]->id == $_GET['id']) {
            $index = $i;
            break;
        }
    }

    if ($index == -1) {
        $_SESSION['cart'][] = $item;
    }
    // $_SESSION['cart']: jadikan $cart sebagain variable di session
    else {
        $_SESSION['cart'] = $cart;
    }
}

// Hapus produk pada cart
if (isset($_GET['index']) && !isset($_POST['update'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
}
// Update jumlah kuantitas produk pada cart
if (isset($_POST['update'])) {
    $arrQuantity = $_POST['quantity'];
    $cart = unserialize(serialize($_SESSION['cart']));
    for ($i = 0; $i < count($cart); $i++) {
        $cart[$i]->quantity = $arrQuantity[$i];
    }
    $_SESSION['cart'] = $cart;
}

?>
<!-- tampilkan data cart -->
<?php if (isset($cart) > 0) { ?>
<div class="well">
<h2>Pesanan Anda</h2><br>
<form method="POST">
<table class="table table-hover table-responsive table-bordered">
<tr>
    <th>Opsi</th>
    <th>#SKU</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Kuantitas</th>
 
    <th>Sub Total (Rp.)</th>
</tr>
<?php
$cart = unserialize(serialize($_SESSION['cart']));
$s = 0;
$index = 0;
for ($i = 0; $i < count($cart); $i++) {
    $s += $cart[$i]->price * $cart[$i]->quantity;
    ?>
   <tr>
        <td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Apa kamu yakin ingin menghapus?')" class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Hapus</a> </td>
        <td> <?php echo $cart[$i]->id; ?> </td>
        <td> <?php echo $cart[$i]->name; ?> </td>
        <td> <?php echo number_format($cart[$i]->price, 2, '.', ','); ?> </td>
        <td> <input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>
        <td> <?php $harga = $cart[$i]->price * $cart[$i]->quantity; echo number_format($harga, 2, '.', ','); ?> </td>
   </tr>
    <?php
$index++;
}?>
    <tr>
        <td colspan="5" style="text-align:right; font-weight:bold">
         <span>Klik Untuk Menjumlahkan</span>
         <input style="height:30px;width:30px" type="image" src="images/save.png" name="update" alt="Save Button">
         <input type="hidden" name="update">
        </td>
        <td> <?php echo number_format($s, 2, '.', ','); ?> </td>
    </tr>
</table>
</form>
</div>
<br>
<a href="index.php" class='btn btn-danger'><span class='glyphicon glyphicon-refresh'></span> Kembali</a><span class="pull-right"><a href="index.php" class='btn btn-primary'><span class='glyphicon glyphicon-shopping-cart'></span> Tambah Pesanan Lagi</a> | <a href="checkout.php" class='btn btn-success'><span class='glyphicon glyphicon-save'></span> Checkout</a></span>
<?php } else { ?>
    <p>Keranjang belanja masih kosong!</p>
<?php }

// menyetting kaki
include_once "footer.php";
?>