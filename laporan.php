<?php
// menyisipkan konfigurasi
include_once "config/core.php";

$harus_login = true;
include_once "cek_login.php";

// menyetting kepala
$judul_halaman = "Laporan Data Transaksi";
include_once "header.php";

// tampilan slide
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

// tombol untuk mencetak laporan data transaksi
echo "<div class='right-button-margin'>
    <a href='cetak.php' target='_blank' class='btn btn-success pull-right'>
        <span class='glyphicon glyphicon-print'></span> Cetak laporan
    </a>
</div>";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="libs/css/bootstrap.css"/>
	</head>
<body>
	<div class="well">
		<table class="table table-hover table-responsive table-bordered">
			<thead class="alert-info">
				<tr>
					<th>No ID</th>
					<th>ID Pengguna</th>
					<th>ID Order</th>
					<th>Tanggal</th>
					<th>Total Bayar</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'config/conn.php';
					$query = $conn->query("SELECT * FROM `transaksi`") or die($conn->error());
					while($fetch = $query->fetch_array()){
				?>
					<tr>
						<td><?php echo $fetch['id']?></td>
						<td><?php echo $fetch['id_pengguna']?></td>
						<td><?php echo $fetch['id_order']?></td>
						<td><?php echo $fetch['tanggal']?></td>
						<td><?php echo $fetch['total_bayar']?></td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
<script src="libs/js/jquery-3.2.1.min.js"></script>
<script src="libs/js/bootstrap.js"></script>
</html>