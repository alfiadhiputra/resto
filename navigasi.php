<!-- navbar -->
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
<div class="container-fluid">
    <div class="navbar-header">
        <!-- untuk menampilkan dropdown pada ponsel -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

        <!-- Ganti "Nama Website" dengan nama websitemu -->
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span> Fiadhi Resto</a>
    </div>

    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            
            <?php
            if (isset($_SESSION['level_akses']) && in_array($_SESSION['level_akses'], array("administrator", "waiter", "kasir"))){
            ?>
            <li <?php echo $judul_halaman=="Index" ? "class='active'" : ""; ?>>
                <a href="<?php echo $alamat_web; ?>">Menu</a>
            </li>
            <li <?php echo $judul_halaman=="Index" ? "class='active'" : ""; ?>>
                <a href="<?php echo $alamat_web; ?>cart.php?index=">Pesanan</a>
            </li>
            <li <?php echo $judul_halaman=="Index" ? "class='active'" : ""; ?>>
                <!-- <a href="<?php echo $alamat_web; ?>laporan/" target="_blank">Laporan</a> -->
                <a href="<?php echo $alamat_web; ?>laporan.php">Laporan</a>
            </li>
            <?php } ?>
            <?php
            if (isset($_SESSION['level_akses']) && in_array($_SESSION['level_akses'], array("owner"))){
            ?>
            <li <?php echo $judul_halaman=="Index" ? "class='active'" : ""; ?>>
                <!-- <a href="<?php echo $alamat_web; ?>laporan/" target="_blank">Laporan</a> -->
                <a href="<?php echo $alamat_web; ?>laporan.php">Laporan</a>
            </li>
            <?php } ?>
        </ul>

        <?php
        // cek jika pengguna sudah login
        // jika pengguna login, tampilkan pilihan "Edit Profile", "Pesan" dan "Logout"
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $judul_halaman=="Edit Profile" ? "class='active'" : ""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        &nbsp;&nbsp;<?php echo $_SESSION['nama_depan']; ?>
                        &nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $alamat_web; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php
        }
        // tampilkan pilihan login dan register di sini
        else{
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $judul_halaman=="Register" ? "class='active'" : ""; ?>>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Register<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li <?php echo $judul_halaman=="Register" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $alamat_web; ?>register">
                                <span class="glyphicon glyphicon-user"></span> Register Petugas
                            </a>
                        </li>
                        <li <?php echo $judul_halaman=="Register" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $alamat_web; ?>register_pelanggan">
                                <span class="glyphicon glyphicon-check"></span> Register Pelanggan
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- <ul class="nav navbar-nav navbar-right">
                <li <?php echo $judul_halaman=="Register" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $alamat_web; ?>register">
                        <span class="glyphicon glyphicon-check"></span> Register
                    </a>
                </li>
            </ul> -->
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $judul_halaman=="Login" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $alamat_web; ?>login">
                        <span class="glyphicon glyphicon-log-in"></span> Log In
                    </a>
                </li>
            </ul>
            <?php
        }
        ?>
    </div><!--/.nav-collapse -->
</div>
</div>
<!-- /navbar -->