<?php
class Produk{
    // koneksi database dan pilih tabel
    private $conn;
    private $nama_tabel = "masakan";

    // properti objek
    public $id;
    public $nama;
    public $harga;
    public $deskripsi;
    public $status_masakan;
    public $id_kategori;
    public $gambar;
    public $dibuat;

    public function __construct($db){
        $this->conn = $db;
    }

    // membuat produk
    function tambah(){
        // menulis query SQL
        $query = "INSERT INTO " . $this->nama_tabel . "
        SET nama=:nama, harga=:harga, deskripsi=:deskripsi, status_masakan=:status_masakan,
            id_kategori=:id_kategori, gambar=:gambar, dibuat=:dibuat";

        $stmt = $this->conn->prepare($query);

        // mengambil nilai dari formulir, lalu tambahkan ke properti
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->harga=htmlspecialchars(strip_tags($this->harga));
        $this->deskripsi=htmlspecialchars(strip_tags($this->deskripsi));
        $this->status_masakan=htmlspecialchars(strip_tags($this->status_masakan));
        $this->id_kategori=htmlspecialchars(strip_tags($this->id_kategori));
        $this->gambar=htmlspecialchars(strip_tags($this->gambar));

        // untuk membuat nilai tanggal dibuat
        $this->dibuat = date('Y-m-d H:i:s');

        // ikat nilai dari properti
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":status_masakan", $this->status_masakan);
        $stmt->bindParam(":id_kategori", $this->id_kategori);
        $stmt->bindParam(":gambar", $this->gambar);
        $stmt->bindParam(":dibuat", $this->dibuat);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    // menampilkan semua data produk
    function lihatSemua($batasan_halaman, $produk_per_halaman){

        $query = "SELECT
                    id, nama, deskripsi, harga, status_masakan, id_kategori, gambar
                FROM " . $this->nama_tabel . "
                ORDER BY
                    nama ASC
                LIMIT
                    {$batasan_halaman}, {$produk_per_halaman}";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }
    // melihat satu produk
    function lihatSatu(){

        $query = "SELECT nama, harga, deskripsi, status_masakan, id_kategori, gambar
                    FROM " . $this->nama_tabel . "
                    WHERE id = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nama = $row['nama'];
        $this->harga = $row['harga'];
        $this->deskripsi = $row['deskripsi'];
        $this->status_masakan = $row['status_masakan'];
        $this->id_kategori = $row['id_kategori'];
        $this->gambar = $row['gambar'];
    }
    // mengubah produk
    function ubah(){
        $query = "UPDATE
                    " . $this->nama_tabel . "
                SET
                    nama = :nama,
                    harga = :harga,
                    deskripsi = :deskripsi,
                    status_masakan = :status_masakan,
                    id_kategori  = :id_kategori
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        // mengambil data dari formulir
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->harga=htmlspecialchars(strip_tags($this->harga));
        $this->deskripsi=htmlspecialchars(strip_tags($this->deskripsi));
        $this->status_masakan=htmlspecialchars(strip_tags($this->status_masakan));
        $this->id_kategori=htmlspecialchars(strip_tags($this->id_kategori));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // mengikat ke parameter
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':harga', $this->harga);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':status_masakan', $this->status_masakan);
        $stmt->bindParam(':id_kategori', $this->id_kategori);
        $stmt->bindParam(':id', $this->id);

        // mengeksekusi query SQL
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // hapus produk
    function hapus(){
        $query = "DELETE FROM " . $this->nama_tabel . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    // untuk menghitung jumlah halaman
    public function hitungSemua(){
        $query = "SELECT id FROM " . $this->nama_tabel . "";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $num = $stmt->rowCount();

        return $num;
    }
    // untuk memproses upload photo ke server
    function uploadPhoto(){
        $pesan_hasil="";

        // sekarang, jika gambar tidak kosong, lakukan proses upload gambar
        if($this->gambar){
            // function sha1_file() digunakan untuk memberi nama unik
            $disimpan_ke = "uploads/";
            $target_file = $disimpan_ke . $this->gambar;
            $tipe_gambar = pathinfo($target_file, PATHINFO_EXTENSION);

            // pesan error akan kosong
            $pesan_error_saat_upload="";
            // Mengidentifikasi apakah ini gambar asli atau palsu.
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
                // yang diupload beneran gambar
            }else{
                $pesan_error_saat_upload.="<div>Yang kamu upload bukan gambar.</div>";
            }

            // Membatasi tipe gambar yang bisa diupload.
            $tipe_yang_dibolehkan=array("jpg", "jpeg", "png", "gif");
            if(!in_array($tipe_gambar, $tipe_yang_dibolehkan)){
                $pesan_error_saat_upload.="<div>Hanya tipe JPG, JPEG, PNG, GIF yang boleh diupload.</div>";
            }

            // Pastikan gambar belum pernah diupload sebelumnya
            if(file_exists($target_file)){
                $pesan_error_saat_upload.="<div>Gambar sudah ada. Coba ganti nama gambarnya.</div>";
            }

            // pastikan gambar tidak terlalu besar, gambar yang diupload tidak boleh lebih besar dari 1 MB
            if($_FILES['image']['size'] > (1024000)){
                $pesan_error_saat_upload.="<div>Ukuran gambar tidak boleh lebih dari 1 MB.</div>";
            }

            // pastikan ada folder "uploads" untuk lokasi penyimpanan gambar yang terupload
            // jika tidak ada, folder akan dibuat otomatis
            if(!is_dir($disimpan_ke)){
                mkdir($disimpan_ke, 0777, true);
            }
            // jika $pesan_error_saat_upload kosong
            if(empty($pesan_error_saat_upload)){
                // itu berarti tidak ada error, kita akan mencoba untuk mengupload gambarnya
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // berarti sekarang poto telah diupload
                }else{
                    $pesan_hasil.="<div class='alert alert-danger'>";
                        $pesan_hasil.="<div>Gagal mengupload photo.</div>";
                        $pesan_hasil.="<div>Silakan coba lagi dengan gambar yang lain.</div>";
                    $pesan_hasil.="</div>";
                }
            }
            // jika $pesan_error_saat_upload tidak kosong
            else{
                // berarti ada erro, tampilkan ke pengunjung website
                $pesan_hasil.="<div class='alert alert-danger'>";
                    $pesan_hasil.="{$pesan_error_saat_upload}";
                    $pesan_hasil.="<div>Silakan coba lagi dengan gambar yang lain.</div>";
                $pesan_hasil.="</div>";
            }
        }

        return $pesan_hasil;
    }
}
?>