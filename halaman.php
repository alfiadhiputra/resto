<?php
echo "<ul class='pagination'>";

// tombol untuk halaman awal
if($halaman>1){
    echo "<li><a href='{$alamat_halaman}' title='Pergi ke halaman pertama.'>";
        echo "Awal";
    echo "</a></li>";
}

// menghitung jumlah halaman
$total_halaman = ceil($jumlah_halaman / $produk_per_halaman);

// rentang link halaman yang ditampilkan
$rentang = 2;

// tampilkan alamat ke 'rentang halaman' di antara 'halaman sekarang'
$nomor_awal = $halaman - $rentang;
$batas_kondisi = ($halaman + $rentang)  + 1;

for ($x=$nomor_awal; $x<$batas_kondisi; $x++) {
    // pastikan '$x lebih besar dari 0' AND 'lebih kecil atau sama dengan $total_halaman'
    if (($x > 0) && ($x <= $total_halaman)) {
        // halaman sekarang
        if ($x == $halaman) {
            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(halaman sekarang)</span></a></li>";
        } 
        // bukan halaman sekarang
        else {
            echo "<li><a href='{$alamat_halaman}halaman=$x'>$x</a></li>";
        }
    }
}

// tombol untuk halaman akhir
if($halaman<$total_halaman){
    echo "<li><a href='" .$alamat_halaman. "halaman={$total_halaman}' title='Halaman terakhir adalah {$total_halaman}.'>";
        echo "Akhir";
    echo "</a></li>";
}

echo "</ul>";
?>