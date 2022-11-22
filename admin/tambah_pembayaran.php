<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <title>Daftar Petugas</title>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login_petugas.php");
        exit;
    }
    ?>
        <div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header">
                        <div class="d-flex justify-content-between">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/illustration/logo.jpg" alt="">
                                    <h3>SPP_Sekolah</h3>
                                </a>
                            </div>
                            <div class="toggler">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Penampilan dashboard -->
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item">
                                <a href="home_admin.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- Kurang bayar -->
                            <li class="sidebar-item">
                                <a href="tagihan.php" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                    <span>Tagihan</span>
                                </a>
                            </li>

                            <!-- history pembayaran -->
                            <li class="sidebar-item  ">
                                <a href="histori_pembayaran.php" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>History pembayaran</span>
                                </a>
                            </li>

                            <!-- Data tambah petugas, siswa, kelas, dan spp -->
                            <li class="sidebar-item  has-sub active">
                                <a href="" class='sidebar-link'>
                                    <i class="bi bi-pen-fill"></i>
                                    <span>Data</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item">
                                        <a href="tambah_petugas.php">Tambah Petugas</a>
                                    </li>
                                    <li class="submenu-item active">
                                        <a href="tambah_siswa.php">Tambah Siswa</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="tambah_kelas.php">Tambah Kelas</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="tambah_spp.php">Tambah SPP</a>
                                    </li>
                                    <li class="submenu-item">
                                    <a href="tambah_pembayaran.php">Tambah Pembayaran</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Laporan -->
                            <li class="sidebar-item  ">
                                <a href="" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Laporan</span>
                                </a>
                            </li>

                            <!-- Otentikasi -->
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-person-badge-fill"></i>
                                    <span>Authentication</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="login.php">Login</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="">Register</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="logout_petugas.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>

            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
            <section class="section">
                <div class="row" id="table-striped">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pembayaran</h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Pembayaran
                                </button>
                                
                            </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="proses_tambah_pembayaran.php" method="post">
                                                    NISN :
                                                    <select name="nisn" class="form-control" id="">
                                                        <option value=""></option>
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_siswa=mysqli_query($koneksi, "select * from siswa");
                                                        while ($data_siswa=mysqli_fetch_array($qry_siswa)) {
                                                            echo '<option value="'.$data_siswa['nisn'].'">'.$data_siswa['nisn'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    

                                                    Tahun SPP : 
                                                    <select name="tahun_spp" class="form-control" id="">
                                                        <option value=""></option>
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_spp=mysqli_query($koneksi, "select * from spp");
                                                        while ($data_spp=mysqli_fetch_array($qry_spp)) {
                                                            echo '<option value="'.$data_spp['id_spp'].'">'.$data_spp['tahun'].'</option>';
                                                        }
                                                        ?>
                                                    </select>

                                                    Angkatan :
                                                    <select name="angkatan" class="form-control" id="">
                                                        <option value=""></option>
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_spp=mysqli_query($koneksi, "select * from spp");
                                                        while ($data_spp=mysqli_fetch_array($qry_spp)) {
                                                            echo '<option value="'.$data_spp['id_spp'].'">'.$data_spp['angkatan'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <input type="submit" value="Tambah Siswa" name="submit" class="btn btn-primary">
                                                </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; <b>SPP_Sekolah</b> All right reserved.</p>
                    </div>
                </div>
            </footer>
            </div>
        </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>