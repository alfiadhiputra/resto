<?php
class Kategori{
    // koneksi database dan pilih tabel
    private $conn;
    private $nama_tabel = "kategori";

    // properti objek
    public $id;
    public $nama;

    public function __construct($db){
        $this->conn = $db;
    }

    // akan ditampilkan pada drop-down form HTML tabel
    function baca(){
        // mengambil semua kategori
        $query = "SELECT
                    id, nama
                FROM
                    " . $this->nama_tabel . "
                ORDER BY
                    nama";  

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }
    // menampilkan nama kategori berdasarkan ID nya
    function bacaNama(){
        $query = "SELECT nama FROM " . $this->nama_tabel . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nama = $row['nama'];
    }
}
?>