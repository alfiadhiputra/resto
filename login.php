<?php
// menyisipkan konfigurasi
include_once "config/core.php";

// menyetting halaman judul
$judul_halaman = "Login";

// mengecek login
$harus_login=false;
include_once "cek_login.php";

// bawaannya false, atau bisa mengakses
$akses_ditolak=false;

// jika pengguna mengklik tombol pada login
if($_POST){
    // menyertakan class database dan pengguna
    include_once "config/database.php";
    include_once "objects/pengguna.php";

    // membuat koneksi ke database
    $database = new Database();
    $db = $database->getConnection();

    // membuat objek pengguna
    $pengguna = new Pengguna($db);

    // menyetting properti email dengan email yang diinputkan pengguna
    $pengguna->username = $_POST['username'];

    // jika email exists/terdaftar, juga dapatkan detail pengguna dengan method emailExists()
    $username_exists = $pengguna->usernameExists();

        // validasi login
        if ($username_exists && password_verify($_POST['password'], $pengguna->password)){
            // jika semua benar, update session value menjadi true
            $_SESSION['logged_in'] = true;
            $_SESSION['id_pengguna'] = $pengguna->id;
            $_SESSION['level_akses'] = $pengguna->level_akses;
            $_SESSION['nama_depan'] = htmlspecialchars($pengguna->nama_depan, ENT_QUOTES, 'UTF-8') ;    
            $_SESSION['nama_belakang'] = $pengguna->nama_belakang;
            $_SESSION['username'] = $pengguna->username;

            // // jika level akses sama dengan 'Admin', alihkan ke bagian admin
            // if($pengguna->level_akses=='Admin'){
            //     header("Location: {$alamat_web}admin/index.php?action=login_success");    
            // }
            if($pengguna->id==1){
                header("Location: {$alamat_web}index.php?action=login_success");    
            }else if($pengguna->id==2){
                header("Location: {$alamat_web}index.php?action=login_success");    
            }else if($pengguna->id==3){
                header("Location: {$alamat_web}cart.php?index=");    
            }else if($pengguna->id==4){
                header("Location: {$alamat_web}laporan/laporan.php?action=login_success");    
            }

            // jika tidak, alihkan ke bagian 'Customer'
            else{
                header("Location: {$alamat_web}index.php?action=login_success");
            }    
        }

        // jika username atau passwordnya salah
        else{
            $akses_ditolak=true;
        }
}

// menambahkan header
include_once "header.php";
include_once "slide.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
    // mendapatkan aksi dari URL untuk aksi tertentu
    $action=isset($_GET['action']) ? $_GET['action'] : "";

    // beritahu ke pengguna bahwa dia belum login
    if($action =='not_yet_logged_in'){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>Silakan Login.</div>";
    }

    // beritahu ke pengguna bahwa dia harus login terlebih dahulu
    else if($action=='please_login'){
        echo "<div class='alert alert-info'>
            <strong>Silakan login terlebih dahulu untuk mengakses halaman ini.</strong>
        </div>";
    }

    // beritahu pengguna bahwa email telah berhasil diverifikasi
    else if($action=='email_verified'){
        echo "<div class='alert alert-success'>
            <strong>Alamat Email berhasil divalidasi.</strong>
        </div>";
    }

    // beritahu pengguna bahwa akses ditolak
    if($akses_ditolak){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>
            Akses ditolak.<br /><br />
            Nama username atau password-mu mungkin salah. Coba lagi!
        </div>";
    }

    // formulir login
    echo "<div class='well'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";
                echo "<img class='profile-img' src='images/resto3.png'>";
                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<p><input type='text' name='username' class='form-control' placeholder='Username' required autofocus /></p>";
                    // echo "<p><input type='text' name='email' class='form-control' placeholder='Email' required autofocus /></p>";
                    echo "<p><input type='password' name='password' class='form-control' placeholder='Password' required /></p>";
                        // echo "<p><label>Login Sebagai :</label><select class='form-control' name='level_akses' required='required'>";
                        //     echo "<option value='administrator'>Administrator</option>";
                        //     echo "<option value='waiter'>Waiter</option>";
                        //     echo "<option value='kasir'>Kasir</option>";
                        //     echo "<option value='owner'>Owner</option>";
                        //     echo "<option value='pelanggan'>Pelanggan</option>";
                        // echo "</select></p>";
                    echo "<p><button type='submit' class='btn btn-lg btn-primary btn-block'><span class='glyphicon glyphicon-log-in'></span> Log In</button></p>";
                    // echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";

echo "</div>";

// menyisipkan footer
include_once "footer.php";
?>
<!-- <footer class="account-wall">
    <div class="copyright text-center my-auto">
        <span>Fiadhi Resto © My Website 2019</span>
    </div>
</footer> -->