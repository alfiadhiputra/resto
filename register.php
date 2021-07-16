<?php
// menambahkan konfigurasi
include_once "config/core.php";

// menyetting judul halaman
$judul_halaman = "Register";

// menyisipkan cek login
include_once "cek_login.php";

// menambahkan kelas
include_once 'config/database.php';
include_once 'objects/pengguna.php';

// menyisipkan bagian header
include_once "header.php";
include_once "slide.php";

echo "<div class='col-md-12'>";

    // ketika tombol register diklik
    if($_POST){
        // menyambungkan ke database
        $database = new Database();
        $db = $database->getConnection();

        // membuat objek
        $pengguna = new Pengguna($db);

        // set email untuk mengecek apakah registrasi menggunakan email yang sudah terdaftar
        $pengguna->username = $_POST['username'];

        // cek email apakah sudah ada di database
        if($pengguna->usernameExists()){
            echo "<div class='alert alert-danger'>";
                echo "Username ini sudah terdaftar. Silakan coba lagi dengan username lain atau klik untuk <a href='{$alamat_web}login'>login.</a>";
            echo "</div>";
        }

        else{
            // simpan data yang didapat dari form ke property object pengguna
            $pengguna->nama_depan=$_POST['nama_depan'];
            $pengguna->nama_belakang=$_POST['nama_belakang'];
            $pengguna->nama_user=$_POST['nama_user'];
            $pengguna->username=$_POST['username'];
            $pengguna->email=$_POST['email'];
            $pengguna->nomer_hp=$_POST['nomer_hp'];
            $pengguna->alamat=$_POST['alamat'];
            $pengguna->password=$_POST['password'];
            $pengguna->level_akses=$_POST['level_akses'];

            // buat pengguna baru
            if($pengguna->create()){

                echo "<div class='alert alert-info'>";
                    echo "Registrasi berhasil. <a href='{$alamat_web}login'>Silakan login</a>.";
                echo "</div>";

                // kembalikan nilai variable POST menjadi kosong
                $_POST=array();

            }else{
                echo "<div class='alert alert-danger' role='alert'>Gagal menambahkan pengguna baru. Silakan coba lagi.</div>";
            }
        }
    }
    ?>
    <div class="well">
    <form action='<?php echo $alamat_web; ?>register.php' method='post' id='register'>
        <table class='table table-responsive'>
            <tr>
                <td class='width-30-percent'>Level Akses</td>
                <td>
                <select name="level_akses" class='form-control'>
                    <option value="administrator">Administrator</option>
                    <option value="waiter">Waiter</option>
                    <option value="kasir">Kasir</option>
                    <option value="owner">Owner</option>
                </select>
                </td>
            </tr>
            <tr>
                <td class='width-30-percent'>Nama Depan</td>
                <td>
                <input type='text' name='nama_depan' class='form-control' required 
                value="<?php echo isset($_POST['nama_depan']) ? htmlspecialchars($_POST['nama_depan'], ENT_QUOTES) : "";  ?>" />
                </td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td>
                <input type='text' name='nama_belakang' class='form-control' required 
                value="<?php echo isset($_POST['nama_belakang']) ? htmlspecialchars($_POST['nama_belakang'], ENT_QUOTES) : "";  ?>" />
                </td>
            </tr>
            <tr>
                <td>Nama User</td>
                <td>
                <input type='text' name='nama_user' class='form-control' required
                value="<?php echo isset($_POST['nama_user']) ? htmlspecialchars($_POST['nama_user'], ENT_QUOTES) : "";  ?>" />
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                <input type='text' name='username' class='form-control' required
                value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : "";  ?>" />
                </td>
            </tr>
            <tr>
                <td>Nomer HP</td>
                <td>
                <input type='text' name='nomer_hp' class='form-control' required 
                value="<?php echo isset($_POST['nomer_hp']) ? htmlspecialchars($_POST['nomer_hp'], ENT_QUOTES) : "";  ?>" />
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name='alamat' class='form-control' required>
                    <?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat'], ENT_QUOTES) : "";  ?>
                </textarea></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                <input type='email' name='email' class='form-control' required 
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" />
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-check"></span> Register
                    </button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <?php

echo "</div>";

// menyisipkan bagian footer
include_once "footer.php";
?>
<!-- <footer class="account-wall">
    <div class="copyright text-center my-auto">
        <span>Fiadhi Resto © My Website 2019</span>
    </div>
</footer> -->