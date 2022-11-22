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
        header("Location: login_siswa.php");
        exit;
    }
    ?>
    <?php
    include "koneksi.php";
    $id_kelas = $_SESSION['id_kelas'];
    $kelas=mysqli_query($koneksi, "select * from kelas where id_kelas='$id_kelas'");
    $dt_kelas=mysqli_fetch_array($kelas);
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
                                <a href="home_siswa.php" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- Kurang bayar -->
                            <li class="sidebar-item active">
                                <a href="../tagihan.php" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                    <span>Transaksi</span>
                                </a>
                            </li>

                            <!-- history pembayaran -->
                            <li class="sidebar-item  ">
                                <a href="history_pembayaran.php" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>History pembayaran</span>
                                </a>
                            </li>

                            <!-- Data tambah petugas, siswa, kelas, dan spp -->
                            <!-- <li class="sidebar-item  has-sub">
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
                            </li> -->

                            <!-- Laporan -->
                            <!-- <li class="sidebar-item  ">
                                <a href="" class='sidebar-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Laporan</span>
                                </a>
                            </li> -->

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
                                        <a href="logout_siswa.php">Logout</a>
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
                <h3 class="mt-3">Biodata Siswa</h3>
                    <table class="table table-striped mb-0">
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><?php echo $_SESSION['nisn']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?php echo $_SESSION['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?php echo $dt_kelas['nama_kelas'];?></td>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nisn=$_SESSION['nisn'];
                                            include "koneksi.php";
                                            $qry_pembayaran=mysqli_query($koneksi, "select pembayaran.nisn,pembayaran.bukti,pembayaran.id_pembayaran, pembayaran.id_spp, pembayaran.bulan_spp, pembayaran.jatuh_tempo, pembayaran.tahun_spp, pembayaran.keterangan, spp.nominal from pembayaran join spp on pembayaran.id_spp=spp.id_spp where pembayaran.nisn='$nisn' ") or die (mysqli_error($koneksi));
                                            $no=0;
                                            while ($data_pembayaran=mysqli_fetch_array($qry_pembayaran)) {
                                                $no++;
                                                $bulan=$data_pembayaran['bulan_spp'];
                                                $tahun=$data_pembayaran['tahun_spp'];
                                                $id_pembayaran = $data_pembayaran['id_pembayaran'];
                                                // $id_spp=$data_pembayaran['nominal'];
                                                // if($data_pembayaran['bukti']==null){
                                                //     $bukti="-";
                                                //    }else{
                                                //     $bukti="<a href='../../siswa/bukti/$data_pembayaran[bukti]'>Lihat Foto</a>
                                                //    ";
                                                // }
                                                    
                                                //     if($data_pembayaran['keterangan']=='lunas'){
                                                //         $bayar="<td>"."<img src='../lunas.png' style='width:40px; heigth:40px;'>"."</td>";
                                                //     }elseif($data_pembayaran['keterangan']=='belum lunas'){
                                                //         $bayar="<td>"."<button type='submit' name='bayar' class='btn btn-primary'>Bayar</button>"."</td>";
                                                //     }
                                                ?>
                                                <tr>
                                                    <td><?=$no?></td>
                                                    <td><?=$data_pembayaran['bulan_spp']?></td>
                                                    <td><?=$data_pembayaran['jatuh_tempo']?></td>
                                                    <td><?=$data_pembayaran['tahun_spp']?></td>
                                                    <td><?=$data_pembayaran['nominal']?></td>
                                                    <!-- Buka Ubah Petugas -->
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_edit<?php echo $data_pembayaran['id_pembayaran'];?>">
                                                        Upload Bukti
                                                        </button>
                                                        
                                                        <div class="modal fade" id="modal_edit<?php echo $data_pembayaran['id_pembayaran'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Bukti</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="proses_upload_bukti.php?id_pembayaran=<?php echo $data_pembayaran['id_pembayaran'];?>" method="post" enctype="multipart/form-data">
                                                                Tahun SPP :
                                                                <input type="text" name="tahun_spp" id="" placeholder="Ex.2021" class="form-control">
                                                                <div class="input-group is-invalid mt-3">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="foto" class="custom-file-input form-control" id="validatedInputGroupCustomFile" required>
                                                                        <label class="custom-file-label" for="validatedInputGroupCustomFile">Pilih file bukti...</label>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <input type="submit" value="Upload Bukti" name="submit" class="btn btn-primary">
                                                                </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Penutup Ubah Petugas -->
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