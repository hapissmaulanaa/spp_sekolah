<?php
    if ($_GET['id_spp']) {
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi, ("delete from spp where id_spp='".$_GET['id_spp']."'"));
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus data spp'); location.href='tambah_spp.php';</script>";
        }else {
            echo "<script>alert('gagal hapus data spp'); location.href='tambah_spp.php';</script>";          
        }
    }
?>
