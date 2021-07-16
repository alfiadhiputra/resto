<?php
// menyisipkan konfigurasi
include_once "config/core.php";
include_once 'config/database.php';

$harus_login=true;
include_once "cek_login.php";

// menyertakan database and file objects
$database = new Database();
$db = $database->getConnection();
include_once 'objects/item.php';

// mendapatkan data pengguna yang sedang login dan data produk dari cart
$id_pengguna = $_SESSION['id_pengguna'];
$tgl = date('Y-m-d');
$cart = unserialize(serialize($_SESSION['cart']));

// menambahkan data ke tabel order
$order = "INSERT INTO `order` 
        (`no_meja`, `tanggal`, `id_pengguna`, `keterangan`, `status_order`) 
        VALUES (:nomer_meja, :tanggal, :id_pengguna, :keterangan, :status_order)";
$stmt = $db->prepare($order);
$stmt->execute([
    ":nomer_meja"=> rand(1, 20),
    ":tanggal"=>$tgl,
    ":id_pengguna"=>$id_pengguna,
    ":keterangan"=>'Pesan Makanan',
    ":status_order"=>'Pending',
]);

# mendapatkan id dari order yang barusan dibuat
$id_order = $db->lastInsertId();

// menambahkan data ke tabel detail_order
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
    $id = $cart[$i]->id;
    $name = $cart[$i]->name;
    $detail_order = "INSERT INTO `detail_order` 
            (`id_order`, `id_barang`, `keterangan`, `status_detail_order`) 
            VALUES 
            (:id_order, :id_barang, :keterangan, :status_detail_order)";
    $stmt = $db->prepare($detail_order);
    $stmt->execute([
        ":id_order"=>$id_order,
        ":id_barang"=>$id,
        ":keterangan"=> "Pesan Makan {$name}",
        ":status_detail_order"=>'Pending',
    ]);
}

// mencari total bayar
$total_bayar = 0;
$index = 0;
for ($i = 0; $i < count($cart); $i++) {
    $total_bayar += $cart[$i]->price * $cart[$i]->quantity;
    $index++;
}

// menambahkan data ke tabel transaksi
$transaksi = "INSERT INTO `transaksi` (`id_pengguna`, `id_order`, `tanggal`, `total_bayar`) VALUES (:id_pengguna,:id_order,:tgl,:total_bayar)";
$stmt = $db->prepare($transaksi);
$stmt->execute([
    ":id_pengguna"=>$id_pengguna,
    ":id_order"=>$id_order,
    ":tgl"=>$tgl,
    ":total_bayar"=>$total_bayar,
]);

// menyetting kepala
$judul_halaman = "Checkout";
include_once "header.php";

?>

<!-- mendapatkan detail dari pesanan yang dibuat -->
<p><h4><span class="alert alert-success">Terima kasih telah memesan, pesanan akan kami proses. Berikut adalah detail pesanan.</span></h4></p><br>
<?php if (isset($cart) > 0) { ?>
<div class="well">
<h2>Pesanan: </h2>
<table class="table table-hover table-responsive table-bordered">
<tr>
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
        <td> <?php echo $cart[$i]->id; ?> </td>
        <td> <?php echo $cart[$i]->name; ?> </td>
        <td> <?php echo number_format($cart[$i]->price, 2, '.', ','); ?> </td>
        <td> <?php echo $cart[$i]->quantity; ?> </td>
        <td> <?php $harga = $cart[$i]->price * $cart[$i]->quantity; echo number_format($harga, 2, '.', ','); ?> </td>
   </tr>
    <?php
$index++;
}?>
    <tr>
        <td colspan="4" style="text-align:right; font-weight:bold">Sub Total (Rp.)
        </td>
        <td> <?php echo number_format($s, 2, '.', ','); ?> </td>
    </tr>
</table>
</div><br>
<span class="pull-right"><a href="<?php echo $alamat_web; ?>" class='btn btn-primary'><span class='glyphicon glyphicon-home'></span> Kembali Ke Menu</a></span>
<?php } else { ?>
    <p>Tidak ada data!</p>
<?php }

// mereset atau mengosongkan cart karena pesanan sudah diproses
$_SESSION['cart'] = [];

// menyetting kaki
include_once "footer.php";
?>