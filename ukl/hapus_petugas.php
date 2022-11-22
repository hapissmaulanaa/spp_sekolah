<?php
    if ($_GET['id_petugas']) {
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi, ("delete from petugas where id_petugas='".$_GET['id_petugas']."'"));
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus data'); location.href='tampil_petugas.php';</script>";
        }else {
            echo "<script>alert('gagal hapus data'); location.href='tampil_petugas.php';</script>";          
        }
    }
?>
