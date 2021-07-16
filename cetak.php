<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// Memberi judul dokumen
$pdf->SetTitle('Laporan Transaksi Order - Fiadhi Resto');
// membuat halaman baru
$pdf->AddPage();
 
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string
$pdf->Cell(190,7,'LAPORAN TRANSAKSI ORDER',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'RESTORAN FIADHI RESTO',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

// menyetting jenis huruf dan ukuran
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,6,' ',0,0); // Memberikan spasi biar table lebih ke tengah
$pdf->Cell(10,6,'No.',1,0,'C');
$pdf->Cell(30,6,'ID Pengguna',1,0,'C');
$pdf->Cell(25,6,'ID Order',1,0,'C');
$pdf->Cell(40,6,'Tanggal',1,0,'C');
$pdf->Cell(50,6,'Total Bayar (Rp.)',1,1,'C');
// keterangan
// $pdf->Cell(a,b,c,d,e,f);
// a = menyetting lebar kolom
// b = menyetting tinggi kolom
// c = memberi tulisan pada kolom
// d = beri nilai 1 jika ingin ada border, 0 tidak ada border
// e = beri nilai 1 jika ingin ada akhir baris, 0 berarti bukan akhir baris
// f = tulis 'C' berarti tulisannya akan menjadi rata tengah, kosongkan jika tidak ingin rata tengah

// membuat koneksi ke database
include_once "config/database.php";
$database = new Database();
$db = $database->getConnection();
// mengambil data dari tabel transaksi
$query = "select * from `transaksi`";
$stmt = $db->prepare($query);
$stmt->execute();

// menampilkan data ke tabel PDF
$total_pendapatan = 0;

// menyetting jenis huruf dan ukuran
$pdf->SetFont('Arial','',10);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $date = date_create($row['tanggal']);
    $total_bayar = number_format($row['total_bayar'], 2, '.', ',');
    $total_pendapatan += $row['total_bayar'];
    if ($total_bayar != '0.00') {
        $pdf->Cell(15,6,'',0,0); // Memberikan spasi biar table lebih ke tengah
        $pdf->Cell(10,6,$row['id'],1,0,'C');
        $pdf->Cell(30,6,$row['id_pengguna'],1,0,'C');
        $pdf->Cell(25,6,$row['id_order'],1,0,'C');
        $pdf->Cell(40,6,date_format($date,"d/m/Y"),1,0,'C');
        $pdf->Cell(50,6,$total_bayar,1,1,'R');
    }
}

// menampilkan kaki / total pendapatan
// menyetting jenis huruf dan ukuran
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(105,10,'Total Pendapatan (Rp.)    ',1,0,'R');
$total_pendapatan = number_format($total_pendapatan, 2, '.', ',');
$pdf->Cell(50,10,$total_pendapatan,1,1,'R');

// menampilkan hasil
$pdf->Output();
 
// menampilkan hasil
$pdf->Output();
?>