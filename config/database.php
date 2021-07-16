<?php
class Database{
    // data login ke database server dan pemilihan database
    private $host = "localhost";
    private $nama_db = "resto";
    private $nama_pengguna = "root";
    private $kata_sandi = "";
    public $conn;

     // menghubungkan ke database
    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nama_db, $this->nama_pengguna, $this->kata_sandi);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>