<?php
session_start();

      if ($_POST) {
        $search = $_POST['search'];
        // $search2=$_POST['search2'];
        include "koneksi.php";
        // $ru=mysqli_query($conn, "select nama_produk from produk");

          if(isset($_POST['search'])){
          include "koneksi.php";
          $his = mysqli_query($koneksi, "select * from siswa where nisn='$search'");
          $f=mysqli_fetch_array($his);
          $row = mysqli_num_rows($his);
          if ($row > 0) {
        }elseif($row==0){
            header('location: searchemptyspp.php');
            }
        }
    }

    if ($_GET){
        $search = $_GET['search'];
        // $search2=$_POST['search2'];
        include "koneksi.php";
        // $ru=mysqli_query($conn, "select nama_produk from produk");

          if(isset($_GET['search'])){
          include "koneksi.php";
          $his = mysqli_query($koneksi, "select * from siswa where nisn='$search'");
          $f=mysqli_fetch_array($his);
          $row = mysqli_num_rows($his);
          if ($row > 0) {
        }elseif($row==0){
            header('location: searchemptyspp.php');
            }
        }
    }
      ?>

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
                                <a href="../home_admin.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- Kurang bayar -->
                            <li class="sidebar-item active">
                                <a href="../tagihan.php" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                    <span>Tagihan</span>
                                </a>
                            </li>

                            <!-- history pembayaran -->
                            <li class="sidebar-item  ">
                                <a href="../histori_pembayaran.php" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>History pembayaran</span>
                                </a>
                            </li>

                            <!-- Data tambah petugas, siswa, kelas, dan spp -->
                            <li class="sidebar-item  has-sub">
                                <a href="" class='sidebar-link'>
                                    <i class="bi bi-pen-fill"></i>
                                    <span>Data</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item">
                                        <a href="../tambah_petugas.php">Tambah Petugas</a>
                                    </li>
                                    <li class="submenu-item">
                                        <a href="../tambah_siswa.php">Tambah Siswa</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="../tambah_kelas.php">Tambah Kelas</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="../tambah_spp.php">Tambah SPP</a>
                                    </li>
                                    <li class="submenu-item">
                                        <a href="../tambah_pembayaran.php">Tambah Pembayaran</a>
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
                                        <a href="../logout_petugas.php">Logout</a>
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
                <form class="form-inline" action="searchspp.php" method="post">
                    <h4>Lakukan pembayaran dengan mencari NISN siswa</h4>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" autofocus autocomplete="off">
                </form>    
                <?php
                include "koneksi.php";
                $sq = mysqli_query($koneksi, "select siswa.nisn,siswa.nama,kelas.nama_kelas from siswa join kelas on siswa.id_kelas=kelas.id_kelas where nisn='$search'") or die(mysqli_error($koneksi));
                    //$sq=mysqli_query($koneksi, "select pembayaran.nisn, siswa.nisn, siswa.nama, siswa.id_kelas, kelas.nama_kelas from pembayaran join siswa on pembayaran.nisn=siswa.nisn join kelas on siswa.id_kelas=kelas.id_kelas ") or die (mysqli_error($koneksi));
                    $f=mysqli_fetch_array($sq);
                ?>                            
                <h3 class="mt-5">Biodata Siswa</h3>
                    <table class="table table-striped mb-0">
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><?php echo $f['nisn']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?php echo $f['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?php echo $f['nama_kelas']; ?></td>
                        </tr>
                    </table>

                    <!-- Mulai tabel -->
                    <div class="row" id="table-striped">
                        <div class="col-12">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Siswa</h4>
                                </div>
                                <div class="card-content">
                                    <!-- table striped -->
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                    <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bulan</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Tahun SPP</th>
                                                <th>Nominal</th>
                                                <th>Bukti</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "koneksi.php";
                                            $qry_pembayaran=mysqli_query($koneksi, "select pembayaran.nisn,pembayaran.bukti,pembayaran.id_pembayaran, pembayaran.id_spp, pembayaran.bulan_spp, pembayaran.jatuh_tempo, pembayaran.tahun_spp, pembayaran.keterangan, spp.nominal from pembayaran join spp on pembayaran.id_spp=spp.id_spp where pembayaran.nisn='$search' ") or die (mysqli_error($koneksi));
                                            $no=0;
                                            while ($data_pembayaran=mysqli_fetch_array($qry_pembayaran)) {
                                                $no++;
                                                $bulan=$data_pembayaran['bulan_spp'];
                                                $tahun=$data_pembayaran['tahun_spp'];
                                                // $id_spp=$data_pembayaran['nominal'];
                                                if($data_pembayaran['bukti']==null){
                                                    $bukti="-";
                                                   }else{
                                                    $bukti="<a href='../img/$data_pembayaran[bukti]'>Lihat Foto</a>
                                                   ";
                                                }
                                                    
                                                    if($data_pembayaran['keterangan']=='lunas'){
                                                        $bayar="<td>"."<img src='../img/lunas.png' style='width:40px; heigth:40px;'>"."</td>";
                                                    }elseif($data_pembayaran['keterangan']=='belum lunas'){
                                                        $bayar="<td>"."<button type='submit' name='bayar' class='btn btn-primary'>Bayar</button>"."</td>";
                                                    }
                                                ?>
                                                <tr><form action="../proses_transaksi.php" method="post">
                                                    <td><?=$no?></td>
                                                    <td><?=$data_pembayaran['bulan_spp']?></td>
                                                    <td><?=$data_pembayaran['jatuh_tempo']?></td>
                                                    <td><?=$data_pembayaran['tahun_spp']?></td>
                                                    <td><?=$data_pembayaran['nominal']?></td>
                                                    <td><?php echo $bukti?></td>
                                                    <td>
                                                    
                                                    <?php
                                                    if($data_pembayaran['keterangan']=='lunas'){
                                                        ?>
                                                        <img src="../img/lunas.png" style="width:40px; heigth:40px">
                                                        <?php
                                                    }elseif($data_pembayaran['keterangan']=='belum lunas'){
                                                        ?>
                                                        <input type="hidden" name="nisn" value="<?=$data_pembayaran['nisn']?>">
                                                        <input type="hidden" name="id_pembayaran" value="<?=$data_pembayaran['id_pembayaran']?>">
                                                        <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
                                                        <?php
                                                    }
                                                    ?>
                                                    </form>
                                                    </td>
                                            </tbody>
                                            <a href=""></a>
                                            <?php
                                            }
                                            ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <footer>
                <div class="footer clearfix mt-10 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; <b>SPP_Sekolah</b> All right reserved.</p>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    <script src="app.js"></script>
    <script src="app.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
<?php
    
?>