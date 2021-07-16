<?php
// objek "pengguna"
class Pengguna{

    // membuat koneksi database dan memilih tabel
    private $conn;
    private $nama_tabel = "user";

    // properti objek
    public $id;
    public $nama_depan;
    public $nama_belakang;
    public $nama_user;
    public $username;
    public $email;
    public $nomer_hp;
    public $alamat;
    public $password;
    public $id_level;
    public $level_akses;
    public $dibuat;
    public $diubah;

    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
    // cek apakah username yang diinputkan terdaftar di database
    function usernameExists(){
        // query untuk mengecek username
        $query = "SELECT id, nama_depan, nama_belakang, nama_user, username, id_level, level_akses, password
                FROM " . $this->nama_tabel . "
                WHERE username = ?
                LIMIT 0,1";

        // menyiapkan query
        $stmt = $this->conn->prepare( $query );

        // menyaring nilai
        $this->username=htmlspecialchars(strip_tags($this->username));

        // mengikat nilai email ke object
        $stmt->bindParam(1, $this->username);

        // mengeksekusi query
        $stmt->execute();

        // mendapatkan jumlah baris dari hasil
        $num = $stmt->rowCount();

        // jika username exists/terdaftar, simpan ke variable/property supaya bisa diakses dari luar
        if($num>0){
            // dapatkan data / records
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // simpan ke property object pengguna
            $this->id = $row['id'];
            $this->nama_depan = $row['nama_depan'];
            $this->nama_belakang = $row['nama_belakang'];
            $this->nama_user = $row['nama_user'];
            $this->username = $row['username'];
            $this->id_level = $row['id_level'];
            $this->level_akses = $row['level_akses'];
            $this->password = $row['password'];

            // kembalikan nilai true karena email beneran terdaftar di database
            return true;
        }

        // return false jika email tidak terdaftar
        return false;
    }
    // membuat pengguna baru
    function create(){
        // menyimpan data tanggal dibuatnya seorang pengguna
        $this->dibuat=date('Y-m-d H:i:s');

        // insert query, yaitu menambahkan data ke database
        $query = "INSERT INTO
                    " . $this->nama_tabel . "
                SET
                    nama_depan = :nama_depan,
                    nama_belakang = :nama_belakang,
                    nama_user = :nama_user,
                    username = :username,
                    email = :email,
                    nomer_hp = :nomer_hp,
                    alamat = :alamat,
                    password = :password,
                    level_akses = :level_akses,
                    dibuat = :dibuat";

        // menyiapkan query
        $stmt = $this->conn->prepare($query);

        // menyaring data yang disimpan
        $this->nama_depan=htmlspecialchars(strip_tags($this->nama_depan));
        $this->nama_belakang=htmlspecialchars(strip_tags($this->nama_belakang));
        $this->nama_user=htmlspecialchars(strip_tags($this->nama_user));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->nomer_hp=htmlspecialchars(strip_tags($this->nomer_hp));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->level_akses=htmlspecialchars(strip_tags($this->level_akses));

        // ikat data
        $stmt->bindParam(':nama_depan', $this->nama_depan);
        $stmt->bindParam(':nama_belakang', $this->nama_belakang);
        $stmt->bindParam(':nama_user', $this->nama_user);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':nomer_hp', $this->nomer_hp);
        $stmt->bindParam(':alamat', $this->alamat);

        // amankan sandi dengan password_hash
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        $stmt->bindParam(':level_akses', $this->level_akses);
        $stmt->bindParam(':dibuat', $this->dibuat);

        // mengeksekusi query, juga cek jika pengguna baru berhasil dibuat atau ada error
        if($stmt->execute()){
            return true;
        }else{
            $this->showError($stmt);
            return false;
        }

    }
    // menampilkan error yang terjadi
    public function showError($stmt){
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }
}